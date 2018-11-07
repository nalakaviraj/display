<?php

namespace App\Http\Controllers;

use App\Division;
use App\Employee;
use App\Estate;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function show(Division $division)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function edit(Division $division)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Division $division)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function destroy(Division $division)
    {
        //
    }


    /**
     * Get divisions for selected estate
     *
     * @param  \App\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function get_division($asc)
    {
        $division  = Division::orderBy('estate_id', 'asc')->get();
        $employees  = Employee::get();
        $estate  = Estate::get();
        //print_r($division);
        echo '</br></br></br><div class="form-group">
          <label for="" class="col-md-2">Division</label>
          <div class="col-md-10">
          <select class="form-control " id="division_id" name="division_id">';
          foreach ($division as $value) {
            $estate_name = (Estate::where('estate_id' , $value->estate_id)->first())->estate_name;
            echo '<option value= " '.$value->division_id.' " >'.$estate_name.' / '.$value->division_name.'</option>';
          }
        echo '</select>
          </div>
        </div>';

        echo '</br></br><div class="form-group">
          <label for="" class="col-md-2">Division Manager</label>
          <div class="col-md-10">
          <select class="form-control " id="division_manager_id" name="division_manager_id">';
          foreach ($employees as $value) {
              $estate_name = (Estate::where('estate_id' , $value->estate_id)->first())->estate_name;
            echo '<option value= " '.$value->employee_id.' " >'.$estate_name.' / '.$value->employee_name.'</option>';
          }
        echo '</select>
          </div>
        </div></br></br>';

        echo '<label for="" class="col-md-2"></label>
        <div class="col-md-10"></br>
            <button type="submit" class="btn btn-primary " id="add">Add</button>
        </div>';

    }


}
