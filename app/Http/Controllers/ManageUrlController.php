<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ClientUrl;

class ManageUrlController extends Controller
{
	/**
	* Show the application.
	*
	* @return \Illuminate\Http\Response
	*/
    public function index()
    {
        $clienturl = ClientUrl::where('enable', 1)->paginate(20);

        return view('admin.manage_url.index', array('responses' => $clienturl));
    }


    public function createView()
    {        
        return view('admin.manage_url.add');
    }



    public function store(Request $request)
    {
        $ClientUrl = new ClientUrl;

        $ClientUrl->client_name    = $request->client_name;
        $ClientUrl->url            = $request->url;       
        $ClientUrl->enable         = $request->enable;

        $ClientUrl->save();

        return redirect('admin/manage_url')->with(['success' => 'URL Saved']);
    }


    public function editView($id)
    {
        $clienturl = ClientUrl::where('url_id', $id)->first();     


        return view('admin.manage_url.edit',array('responses' => $clienturl));
    }


    public function update(Request $request)
    {

        ClientUrl::where('url_id', $request->url_id)
          ->update(['client_name' => $request->client_name,
                    'url' => $request->url,
                    'enable' => $request->enable,
            ]);

        return redirect('admin/manage_url')->with(['success' => 'URL Updated']);
    }

    public function delete(Request $request)
    {
        $deletedRows = ClientUrl::where('url_id', $request->url_id)->delete();

        return redirect('admin/manage_url')->with(['success' => 'URL Deleted']);
    }


}
