<?php

namespace App\Http\Controllers;

use App\Rss;
use App\Str;
use Illuminate\Http\Request;

class RssController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $rss = Rss::get();
        return view('admin.rss.index', array('responses' => $rss));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.rss.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $rss = new Rss;
        $rss->news = $request->news;
        if ($request->schedule) {
            $rss->schedule = $request->schedule;
            $rss->startdate = $request->startdate;
            $rss->enddate = $request->enddate;
        }
        $rss->save();

        return back()->with(['success' => 'Successfully Added!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rss  $rss
     * @return \Illuminate\Http\Response
     */
    public function show(Rss $rss) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rss  $rss
     * @return \Illuminate\Http\Response
     */
    public function edit($rss) {
        $rss = Rss::where('id',$rss)->first();
        return view('admin.rss.edit',array('rss' => $rss));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rss  $rss
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request) {
        $rss = Rss::where('id',$request->id)
                ->update([
                    'news' => $request->news,
                    'startdate' => $request->startdate,
                    'enddate' => $request->enddate
                ]);
        
        return redirect('/admin/news')->with(['success' => 'Successfully Updated!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rss  $rss
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $rss) {
        $deletedRows = Rss::where('id', $rss->id)->delete();
        return redirect('/admin/news')->with(['success' => 'Successfully Deleted!']);
    }

}
