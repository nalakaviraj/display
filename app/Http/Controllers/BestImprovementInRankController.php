<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Estate;
use App\Division;
use App\Region;
use App\BestImprovementInRank;
use Illuminate\Http\Request;

class BestImprovementInRankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $bestimprovementinrank = BestImprovementInRank::where('plantation_id',1)->get();

      return view('admin.bestimprovementinrank.index', array('responses' => $bestimprovementinrank));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createView($plan)
    {
      if($plan == 'KVPL')
      {
          $plan_id = 1;

      }
      else if($plan == 'TTEL')
      {
          $plan_id = 2;
      }

      $employee = Employee::where('plantation_id', $plan_id )->where('enable', 1)->get();
      $estate = Estate::where('plantation_id', $plan_id )->where('enable', 1)->get();
      $region = Region::where('plantation_id', $plan_id )->get();
      $bestimprovementinrank = BestImprovementInRank::where('plantation_id', $plan_id)->get();

      return view('admin.bestimprovementinrank.add', array('responses' => $employee,'estates' => $estate, 'bestimprovementinrank' => $bestimprovementinrank,'plantation_id' => $plan_id,'region' => $region));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      $bestimprovementinrank = new BestImprovementInRank;

      $estate_manager_id = $request->estate_id;
      $estateManagerId = explode("_", $estate_manager_id);
      list($estate_id,$manager_id) = $estateManagerId;

      $bestimprovementinrank->estate_id     = $estate_id;
      $bestimprovementinrank->region        = $request->region;
      $bestimprovementinrank->plantation_id = $request->plantation_id;
      $bestimprovementinrank->division_id    = $request->division_id;
        $bestimprovementinrank->manager_id   = $manager_id;
        $bestimprovementinrank->division_manager_id = $request->division_manager_id;
        $bestimprovementinrank->enable = 1;
      
      

      $bestimprovementinrank->save();
      return back()->with(['success' => 'Record Added']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BestImprovementInRank  $bestImprovementInRank
     * @return \Illuminate\Http\Response
     */
    public function show(BestImprovementInRank $bestImprovementInRank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BestImprovementInRank  $bestImprovementInRank
     * @return \Illuminate\Http\Response
     */
    public function edit(BestImprovementInRank $bestImprovementInRank)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BestImprovementInRank  $bestImprovementInRank
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BestImprovementInRank $bestImprovementInRank)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BestImprovementInRank  $bestImprovementInRank
     * @return \Illuminate\Http\Response
     */
    public function destroy(BestImprovementInRank $bestImprovementInRank)
    {
        //
    }

    public function delete(Request $request)
    {

        // echo $request->checkbox_value;
        $deletedRows = BestImprovementInRank::where('id',$request->id)->delete();
        return back()->with(['success' => 'Record Deleted']);
    }
}
