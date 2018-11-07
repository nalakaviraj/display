<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Employee;
use App\Estate;
use App\Division;
use App\Region;
use App\BestProfitPerHect;


class BestProfitPerHectController extends Controller
{
    /**
     * Show the application admin dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = Employee::where('enable', 1)->get();

        return view('admin.bestprofitperhect.index', array('responses' => $employee));
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
        $bestprofitperhects = BestProfitPerHect::where('plantation_id', $plan_id)->get();

        return view('admin.bestprofitperhect.add', array('responses' => $employee ,'divisions' =>$division,'estates' => $estate, 'bestprofitperhects' => $bestprofitperhects,'plantation_id' => $plan_id,'region' => $region));
    }


    public function create(Request $request)
    {
        $BestProfitPerHect = new BestProfitPerHect;

        $estate_manager_id = $request->estate_id;
        $estateManagerId = explode("_", $estate_manager_id);
        list($estate_id,$manager_id) = $estateManagerId;

        $BestProfitPerHect->estate_id     = $estate_id;
        $BestProfitPerHect->region        = $request->region;
        $BestProfitPerHect->plantation_id = $request->plantation_id;
        $BestProfitPerHect->division_id    = $request->division_id;
        $BestProfitPerHect->manager_id   = $manager_id;
        $BestProfitPerHect->division_manager_id = $request->division_manager_id;
        $BestProfitPerHect->enable = 1;

        $BestProfitPerHect->save();
        return back()->with(['success' => 'Record Added']);
    }

    public function delete(Request $request)
    {
        $deletedRows = BestProfitPerHect::where('id',$request->id)->delete();
        return back()->with(['success' => 'Record Deleted']);
    }

}
