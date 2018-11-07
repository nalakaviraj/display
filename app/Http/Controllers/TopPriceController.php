<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Estate;
use App\Division;
use App\Region;
use App\TopPrice;
use Illuminate\Http\Request;

class TopPriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
       $topprice = TopPrice::where('plantation_id',1)->get();

       return view('admin.topprice.index', array('responses' => $topprice));
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
        $topprice = TopPrice::where('plantation_id', $plan_id)->get();

        return view('admin.topprice.add', array('responses' => $employee,'estates' => $estate, 'topprice' => $topprice,'plantation_id' => $plan_id,'region' => $region));
      }

      public function create(Request $request)
      {
        $topprice = new TopPrice;

        $estate_manager_id = $request->estate_id;
        $estateManagerId = explode("_", $estate_manager_id);
        list($estate_id,$manager_id) = $estateManagerId;

        $topprice->estate_id     = $estate_id;
        $topprice->region        = $request->region;
        $topprice->plantation_id = $request->plantation_id;
        $topprice->manager_id   = $manager_id;
        $topprice->enable = 1;

        $topprice->save();
        return back()->with(['success' => 'Record Added']);
      }

      public function delete(Request $request)
      {
          $deletedRows = TopPrice::where('id',$request->id)->delete();
          return back()->with(['success' => 'Record Deleted']);
      }
}
