<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\User;


class UserController extends Controller
{
    /**
	* Show the Admin User.
	*
	* @return \Illuminate\Http\Response
	*/
    public function index()
    {
        $user = User::paginate(10);

        return view('admin.user.index', array('responses' => $user));
    }

    public function createView()
    {
    	return view('admin.user.add');
    }

    public function store(Request $request)
    {
    	User::create(array(
                'name' => $request->get('name'),
                'username' => $request->get('username'),
                'password'=> bcrypt($request->get('password')),
                'admin_type'=> $request->get('admin_type')
        ));

        return redirect('admin/user')->with(['success' => 'Admin User Saved']);
    }

    public function delete(Request $request)
    {
        $deletedRows = User::where('id', $request->id)->delete();

        return redirect('admin/user')->with(['success' => 'Admin User Deleted']);
    }
}
