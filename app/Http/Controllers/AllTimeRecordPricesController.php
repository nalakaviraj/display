<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Estate;
use App\Division;
use App\Region;
use App\AllTimeRecordPrices;
use Illuminate\Http\Request;

class AllTimeRecordPricesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $alltimerecordprices = AllTimeRecordPrices::where('plantation_id',1)->get();

      return view('admin.alltimerecordprices.index', array('responses' => $alltimerecordprices));
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
       $alltimerecordprices = AllTimeRecordPrices::where('plantation_id', $plan_id)->get();

       return view('admin.alltimerecordprices.add', array('responses' => $employee,'estates' => $estate, 'alltimerecordprices' => $alltimerecordprices,'plantation_id' => $plan_id,'region' => $region));
     }

     public function create(Request $request)
     {
       $alltimerecordprices = new AllTimeRecordPrices;

       $estate_manager_id = $request->estate_id;
       $estateManagerId = explode("_", $estate_manager_id);
       list($estate_id,$manager_id) = $estateManagerId;

       $alltimerecordprices->estate_id     = $estate_id;
       $alltimerecordprices->region        = $request->region;
       $alltimerecordprices->plantation_id = $request->plantation_id;
       $alltimerecordprices->manager_id   = $manager_id;
       $alltimerecordprices->enable = 1;

       $alltimerecordprices->save();
       return back()->with(['success' => 'Record Added']);
     }

     public function delete(Request $request)
     {

         // echo $request->checkbox_value;
         $deletedRows = AllTimeRecordPrices::where('id',$request->id)->delete();
         return back()->with(['success' => 'Record Deleted']);
     }

}
