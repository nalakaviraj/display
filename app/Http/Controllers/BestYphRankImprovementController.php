<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Employee;
use App\Estate;
use App\Division;
use App\Region;
use App\BestYphRankImprovement;

class BestYphRankImprovementController extends Controller
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
        $bestyphrankimprovement = BestYphRankImprovement::where('plantation_id', $plan_id)->get();

        return view('admin.bestyphrankimprovement.add', array('responses' => $employee ,'divisions' =>$division,'estates' => $estate, 'bestyphrankimprovement' => $bestyphrankimprovement,'plantation_id' => $plan_id,'region' => $region));
    }


    public function create(Request $request)
    {
        $bestyphrankimprovement = new BestYphRankImprovement;

        $estate_manager_id = $request->estate_id;
        $estateManagerId = explode("_", $estate_manager_id);
        list($estate_id,$manager_id) = $estateManagerId;

        $bestyphrankimprovement->estate_id     = $estate_id;
        $bestyphrankimprovement->region        = $request->region;
        $bestyphrankimprovement->plantation_id = $request->plantation_id;
        $bestyphrankimprovement->division_id    = $request->division_id;
        $bestyphrankimprovement->manager_id   = $manager_id;
        $bestyphrankimprovement->division_manager_id = $request->division_manager_id;
        $bestyphrankimprovement->enable = 1;

        $bestyphrankimprovement->save();
        return back()->with(['success' => 'Record Added']);
    }

    public function delete(Request $request)
    {
        $deletedRows = BestYphRankImprovement::where('id',$request->id)->delete();
        return back()->with(['success' => 'Record Deleted']);
    }
}
