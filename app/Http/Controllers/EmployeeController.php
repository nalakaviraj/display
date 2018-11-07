<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Plantation;
use App\Estate;
use App\UserType;
use App\Division;

use Carbon\Carbon;

class EmployeeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application admin dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $employee = Employee::where('enable', 1)->get();
        //$employee = Employee::where('enable', 1)->paginate(10);
        return view('admin.employee.index', array('responses' => $employee));
    }



    public function createView()
    {
        $plantation = Plantation::where('enable', 1)->get();
        $estate = Estate::where('enable', 1)->get();
        $userType = UserType::where('enable', 1)->get();
        $division = Division::where('enable', 1)->get();
        return view('admin.employee.add',array('plantations' => $plantation, 'estates' => $estate,'divisions' => $division, 'userTypes' => $userType));
    }


    public function store(Request $request)
    {
       
        
        $employee = new Employee;

        $employee->employee_name            = $request->employee_name;
        $employee->plantation_id            = $request->plantation_id;
        $employee->estate_id                = $request->estate_id;
        $employee->division_id              = $request->division_id;
        $employee->user_type_id             = $request->user_type_id;
        $employee->enable                   = $request->enable;
        
        $employee->save();
        $this->decode($request->image,$employee->id);
        
        Employee::where('employee_id', $employee->id)->update(['employee_image_path_name' => $employee->id]);
        
        return redirect('admin/employee')->with(['success' => 'Employee Saved']);
    }
    
    function decode ($code, $username) {
        list($type, $code) = explode(';', $code);
        list(, $code)      = explode(',', $code);
        $code = base64_decode($code);

        file_put_contents('assets/images/employee/'.$username.'.png', $code);
    }

    public function editView($id)
    {
        $plantation =   Plantation::where('enable', 1)->get();
        $estate =       Estate::where('enable', 1)->get();
        $userType =     UserType::where('enable', 1)->get();
        $division =     Division::where('enable', 1)->get();
        $employee =     Employee::where('employee_id',$id)->first();
        

        return view('admin.employee.edit',array('plantations' => $plantation, 'estates' => $estate, 'userTypes' => $userType, 'responses' => $employee,'divisions' => $division));
    }


    public function update(Request $request)
    {
        if($request->file('image')){
              $employee_image_path_name = $this->createImage($request->file('image'),$request->employee_id,$request->file('image')->getClientOriginalName());
              Employee::where('employee_id', $request->employee_id)
                ->update(['employee_name' => $request->employee_name,
                          'plantation_id' => $request->plantation_id,
                          'estate_id' => $request->estate_id,
                          'division_id' => $request->division_id,
                          'enable' => $request->enable,
                          'employee_image_path_name' => $employee_image_path_name,
                  ]);
        }else{
          Employee::where('employee_id', $request->employee_id)
            ->update(['employee_name' => $request->employee_name,
                      'plantation_id' => $request->plantation_id,
                      'estate_id' => $request->estate_id,
                      'division_id' => $request->division_id,
                      'enable' => $request->enable,
              ]);
        }
        //echo $employee_image_path_name;
        return redirect('admin/employee')->with(['success' => 'Employee Updated']);
    }


    public function delete(Request $request)
    {
        $deletedRows = Employee::where('employee_id', $request->employee_id)->delete();

        return redirect('admin/employee')->with(['success' => 'Employee Deleted']);
    }

    public function createImage($image,$id,$ori_name){

        $path = '/assets/images/employee/';

        $name = "Employee".$id.$ori_name;

        $image->move(getcwd().$path, $name);

        return $name;

    }

    public function deleteImage($oldpath){

        $oldpath = getcwd().$oldpath;

        unlink(realpath($oldpath));

    }

}
