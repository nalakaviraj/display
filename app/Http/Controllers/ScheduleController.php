<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Schedule;
use App\ClientUrl;
use App\TblScreen;

class ScheduleController extends Controller
{
    /**
	* Show the Schedules.
	*
	* @return \Illuminate\Http\Response
	*/
    public function index()
    {
        $clientscreen = TblScreen::where('enable', 1)->get();

        return view('admin.schedule.index', array('clientscreens' => $clientscreen));
    }

    public function viewScreenSchedule($screen_id)
    {
        //echo $screen_id;die();

        $schedule = Schedule::where('screen_id', $screen_id)->paginate(20);
        $clienturls = ClientUrl::where('enable', 1)->get();
        $clientscreen = TblScreen::where('id', $screen_id)->first();

        return view('admin.schedule.add', array('responses' => $schedule, 'screen_id' => $screen_id, 'clienturls' => $clienturls, 'clientscreen' => $clientscreen));
    }

    public function update(Request $request)
    {

        Schedule::where('screen_id', $request->screen_id)
          ->where('screen_schedule_id', $request->screen_schedule_id)
          ->update(['client_url_id' => $request->client_url_id,
            ]);

        echo 1;
    }

    /**
    * Show the Schedules.
    *
    * @return \Illuminate\Http\Response
    */
    public function viewScreenScheduleUpdate($screen_id)
    {
        $clienturls = ClientUrl::where('enable', 1)->get();
        $clientscreen = TblScreen::where('id', $screen_id)->first();

        return view('admin.schedule.view', array('clienturls' => $clienturls, 'screen_id' => $screen_id, 'clientscreen' => $clientscreen));
    }

    public function screenScheduleUpdate(Request $request)
    {
        
        $schedule = new Schedule;

        $schedule_screen_count = Schedule::where('screen_id', $request->screen_id)->count();

        $schedule->client_url_id = $request->client_url_id;
        $schedule->screen_id = $request->screen_id;

        if ($schedule_screen_count == 0) {
            
            $screen_schedule_id = 1;
            //echo $screen_schedule_id;die();
            $schedule->screen_schedule_id = $screen_schedule_id;

        }else {
            $schedule_screen_count += 1;
            //echo $schedule_screen_count;die();
            $schedule->screen_schedule_id = $schedule_screen_count;
        }


        $schedule->save();


          return redirect('admin/schedule/view_screen_schedule/'.$request->screen_id)->with(['success' => 'Schedule Updated']);
    }

}
