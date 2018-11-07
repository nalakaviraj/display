<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Employee;
use App\Estate;
use App\Division;
use App\Region;
use App\HighestYph;

class HighestYphController extends Controller
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
        $highestyph = HighestYph::where('plantation_id', $plan_id)->get();

        return view('admin.highestyph.add', array('responses' => $employee ,'divisions' =>$division,'estates' => $estate, 'highestyph' => $highestyph,'plantation_id' => $plan_id,'region' => $region));
    }


    public function create(Request $request)
    {
            $HighestYph = new HighestYph;

            $estate_manager_id = $request->estate_id;
            $estateManagerId = explode("_", $estate_manager_id);
            list($estate_id,$manager_id) = $estateManagerId;

            $HighestYph->estate_id     = $estate_id;
            $HighestYph->region        = $request->region;
            $HighestYph->plantation_id = $request->plantation_id;
            $HighestYph->division_id    = $request->division_id;
            $HighestYph->manager_id   = $manager_id;
            $HighestYph->division_manager_id = $request->division_manager_id;
            $HighestYph->enable = 1;

            $HighestYph->save();
            return back()->with(['success' => 'Record Added']);

    }

    public function delete(Request $request)
    {
        $deletedRows = HighestYph::where('id',$request->id)->delete();
        return back()->with(['success' => 'Record Deleted']);
    }

}
