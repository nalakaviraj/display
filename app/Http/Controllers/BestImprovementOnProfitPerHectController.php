<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Employee;
use App\Estate;
use App\Division;
use App\Region;
use App\BestImprovementOnprofitPerHect;

class BestImprovementOnProfitPerHectController extends Controller
{
    /**
     * Show the application.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$employee = Employee::where('enable', 1)->get();
        $bestimprovementonprofitperhect = BestImprovementOnprofitPerHect::where('plantation_id',1)->get();

        return view('admin.bestimprovementonprofitperhect.index', array('responses' => $bestimprovementonprofitperhect));
    }


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
        $bestimprovementonprofitperhect = BestImprovementOnprofitPerHect::where('plantation_id', $plan_id)->get();

        return view('admin.bestimprovementonprofitperhect.add', array('responses' => $employee ,'divisions' =>$division,'estates' => $estate, 'bestimprovementonprofitperhect' => $bestimprovementonprofitperhect,'plantation_id' => $plan_id,'region' => $region));
    }


    public function create(Request $request)
    {

        $BestImprovementOnprofitPerHect = new BestImprovementOnprofitPerHect;

        $estate_manager_id = $request->estate_id;
        $estateManagerId = explode("_", $estate_manager_id);
        list($estate_id,$manager_id) = $estateManagerId;

        $BestImprovementOnprofitPerHect->estate_id     = $estate_id;
        $BestImprovementOnprofitPerHect->region        = $request->region;
        $BestImprovementOnprofitPerHect->plantation_id = $request->plantation_id;
        $BestImprovementOnprofitPerHect->division_id    = $request->division_id;
        $BestImprovementOnprofitPerHect->manager_id   = $manager_id;
        $BestImprovementOnprofitPerHect->division_manager_id = $request->division_manager_id;
        $BestImprovementOnprofitPerHect->enable = 1;

        $BestImprovementOnprofitPerHect->save();
        return back()->with(['success' => 'Record Added']);
    }

    public function delete(Request $request)
    {

        // echo $request->checkbox_value;
        $deletedRows = BestImprovementOnprofitPerHect::where('id',$request->id)->delete();
        return back()->with(['success' => 'Employee Deleted']);
    }
}
