<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Employee;
use App\Estate;
use App\Division;
use App\Region;
use App\HighestRevenuePerHect;

class HighestRevenuePerHectController extends Controller
{
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
        $division = Division::where('enable', 1)->get();
        $region = Region::where('plantation_id', $plan_id )->get();
        $highestrevenueperhect = HighestRevenuePerHect::where('plantation_id', $plan_id)->get();

        return view('admin.highestrevenueperhect.add', array('responses' => $employee ,'divisions' =>$division,'estates' => $estate, 'highestrevenueperhect' => $highestrevenueperhect,'plantation_id' => $plan_id,'region' => $region));
    }


    public function create(Request $request)
    {
        $highestrevenueperhect = new HighestRevenuePerHect;

        $estate_manager_id = $request->estate_id;
        $estateManagerId = explode("_", $estate_manager_id);
        list($estate_id,$manager_id) = $estateManagerId;

        $highestrevenueperhect->estate_id     = $estate_id;
        $highestrevenueperhect->region        = $request->region;
        $highestrevenueperhect->plantation_id = $request->plantation_id;
        $highestrevenueperhect->division_id    = $request->division_id;
        $highestrevenueperhect->manager_id   = $manager_id;
        $highestrevenueperhect->division_manager_id = $request->division_manager_id;
        $highestrevenueperhect->enable = 1;

        $highestrevenueperhect->save();
        return back()->with(['success' => 'Record Added']);
    }

    public function delete(Request $request)
    {
      $deletedRows = HighestRevenuePerHect::where('id',$request->id)->delete();
      return back()->with(['success' => 'Record Deleted']);
    }
}
