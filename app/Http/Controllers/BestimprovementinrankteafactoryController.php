<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Estate;
use App\Division;
use App\Region;
use App\Bestimprovementinrankteafactory;
use Illuminate\Http\Request;

class BestimprovementinrankteafactoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $bestimprovementinrankteafactory = Bestimprovementinrankteafactory::where('plantation_id',1)->get();

      return view('admin.bestimprovementinrankteafactory.index', array('responses' => $bestimprovementinrankteafactory));
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
      $bestimprovementinrankteafactory = Bestimprovementinrankteafactory::where('plantation_id', $plan_id)->get();

      return view('admin.bestimprovementinrankteafactory.add', array('responses' => $employee,'estates' => $estate, 'bestimprovementinrankteafactory' => $bestimprovementinrankteafactory,'plantation_id' => $plan_id,'region' => $region));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      $bestimprovementinrankteafactory = new Bestimprovementinrankteafactory;

      $estate_manager_id = $request->estate_id;
      $estateManagerId = explode("_", $estate_manager_id);
      list($estate_id,$manager_id) = $estateManagerId;

        $bestimprovementinrankteafactory->estate_id             = $estate_id;
        $bestimprovementinrankteafactory->region                = $request->region;
        $bestimprovementinrankteafactory->plantation_id         = $request->plantation_id;
        $bestimprovementinrankteafactory->manager_id            = $manager_id;
        $bestimprovementinrankteafactory->enable                = 1;
      
      

      $bestimprovementinrankteafactory->save();
      return back()->with(['success' => 'Record Added']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BestImprovementInRank  $bestImprovementInRank
     * @return \Illuminate\Http\Response
     */
    public function show(Bestimprovementinrankteafactory $bestImprovementInRank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BestImprovementInRank  $bestImprovementInRank
     * @return \Illuminate\Http\Response
     */
    public function edit(Bestimprovementinrankteafactory $bestImprovementInRank)
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
    public function update(Request $request, Bestimprovementinrankteafactory $bestImprovementInRank)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BestImprovementInRank  $bestImprovementInRank
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bestimprovementinrankteafactory $bestImprovementInRank)
    {
        //
    }

    public function delete(Request $request)
    {

        // echo $request->checkbox_value;
        $deletedRows = Bestimprovementinrankteafactory::where('id',$request->id)->delete();
        return back()->with(['success' => 'Record Deleted']);
    }
}
