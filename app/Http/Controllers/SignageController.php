<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\TblCounter;
use App\Schedule;
use App\ClientUrl;
use App\BestProfitPerHect;
use App\BestImprovementOnprofitPerHect;
use App\HighestRevenuePerHect;
use App\HighestYph;
use App\BestYphRankImprovement;
use App\BestImprovementInRank;
use App\AllTimeRecordPrices;
use App\Bestimprovementinrankteafactory;
use App\TopPrice;
use App\Rss;
use App\Video;

class SignageController extends Controller {

    /**
     * Show the signages.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        //exit('screen_id '.$request->input('screen_id'));
        //$employee = Employee::where('enable', 1)->paginate(20);
        $URL_Count = Schedule::where('screen_id', $request->input('screen_id'))->count();
        $url = "";
        $count_values = TblCounter::where('screen_id', $request->input('screen_id'))->first();

        $count_value = $count_values['rotation_count'];

        if ($count_value >= $URL_Count) {
            $count_value = 1;
        } else {
            $count_value++;
        }

        TblCounter::where('screen_id', $request->input('screen_id'))
                ->update(['rotation_count' => $count_value,
        ]);

        // $tbl_counter = TblCounter::find(1);
        // $tbl_counter->rotation_count = $count_value;
        // $tbl_counter->save();
        // echo $count_value.' '.$URL_Count;
        // die();
 
        $seted_url = $this->select_url($count_value, $URL_Count);
        
        //select all videos
        $videos = Video::where('status',1)->get();

        //$rss = Rss::get();

        //return view('welcome', array('seted_url' => $seted_url,'videos' => $videos,'rss' => $rss));
        return view('welcome', array('seted_url' => $seted_url,'videos' => $videos));
    }
    
    public function Get_url(Request $request) {
        $URL_Count = Schedule::where('screen_id', $request->input('screen_id'))->count();
        $url = "";
        $count_values = TblCounter::where('screen_id', $request->input('screen_id'))->first();

        $count_value = $count_values['rotation_count'];

        if ($count_value >= $URL_Count) {
            $count_value = 1;
        } else {
            $count_value++;
        }

        TblCounter::where('screen_id', $request->input('screen_id'))
                ->update(['rotation_count' => $count_value,
        ]);

        $seted_url = $this->select_url($count_value, $URL_Count);

        return $seted_url;
    } 

    public function select_url($c_val, $URL_Count) {
        
        if ($c_val > $URL_Count) {
            $c_val = 1;
        }

        $url_data = Schedule::where('screen_schedule_id', $c_val)->first();

        $url_id = $url_data['client_url_id'];

        $client_url_data = ClientUrl::where('url_id', $url_id)->first();

        $url = $client_url_data['url'];

        return $url;
    }

    public function bestprofitperhect() {
        $employee = BestProfitPerHect::where('enable', 1)->get();
        return view('signage.bestprofitperhect.index', array('responses' => $employee));
    }

//**********************************************************************************************************//
//bestimprovementonprofitperhect
//**********************************************************************************************************//
    public function bestimprovementonprofitperhect() {
        $employeepl1 = BestImprovementOnprofitPerHect::where('enable', 1)->where('plantation_id', 1)->get();
        $employeepl2 = BestImprovementOnprofitPerHect::where('enable', 1)->where('plantation_id', 2)->get();
        return view('signage.bestimprovementonprofitperhect.index', array('responsespl1' => $employeepl1, 'responsespl2' => $employeepl2));
    }

    public function bestimprovementonprofitperhecttttl() {
        $employeepl1 = BestImprovementOnprofitPerHect::where('enable', 1)->where('plantation_id', 2)->get();
        return view('signage.bestimprovementonprofitperhect.ttl', array('responsespl1' => $employeepl1));
    }

    public function bestimprovementonprofitperhectkvpl() {
        $employeepl1 = BestImprovementOnprofitPerHect::where('enable', 1)->where('plantation_id', 1)->get();
        return view('signage.bestimprovementonprofitperhect.kvpl', array('responsespl1' => $employeepl1));
    }

//**********************************************************************************************************//
//higestrevenueperhec
//**********************************************************************************************************//

    public function higestrevenueperhectttl() {
        $employeepl1 = HighestRevenuePerHect::where('enable', 1)->where('plantation_id', 2)->get();
        return view('signage.higestrevenueperhect.ttl', array('responsespl1' => $employeepl1));
    }

    public function higestrevenueperhectkvpl() {
        $employeepl1 = HighestRevenuePerHect::where('enable', 1)->where('plantation_id', 1)->get();
        return view('signage.higestrevenueperhect.kvpl', array('responsespl1' => $employeepl1));
    }

//**********************************************************************************************************//
//bestprofitperhect
//**********************************************************************************************************//

    public function bestprofitperhectttl() {
        $employeepl1 = BestProfitPerHect::where('enable', 1)->where('plantation_id', 2)->get();
        return view('signage.bestprofitperhect.ttl', array('responsespl1' => $employeepl1));
    }

    public function bestprofitperhectkvpl() {
        $employeepl1 = BestProfitPerHect::where('enable', 1)->where('plantation_id', 1)->get();
        return view('signage.bestprofitperhect.kvpl', array('responsespl1' => $employeepl1));
    }

//**********************************************************************************************************//
//highest yph
//**********************************************************************************************************//

    public function highestyphttl() {
        $employeepl1 = HighestYph::where('enable', 1)->where('plantation_id', 2)->get();
        return view('signage.highestyph.ttl', array('responsespl1' => $employeepl1));
    }

    public function highestyphkvpl() {
        $employeepl1 = HighestYph::where('enable', 1)->where('plantation_id', 1)->get();
        return view('signage.highestyph.kvpl', array('responsespl1' => $employeepl1));
    }

//**********************************************************************************************************//
//bestyphrankimprovement
//**********************************************************************************************************//

    public function bestyphrankimprovementttl() {
        $employeepl1 = BestYphRankImprovement::where('enable', 1)->where('plantation_id', 2)->get();
        return view('signage.bestyphrankimprovement.ttl', array('responsespl1' => $employeepl1));
    }

    public function bestyphrankimprovementkvpl() {
        $employeepl1 = BestYphRankImprovement::where('enable', 1)->where('plantation_id', 1)->get();
        return view('signage.bestyphrankimprovement.kvpl', array('responsespl1' => $employeepl1));
    }

//**********************************************************************************************************//
//best improvement in rank
//**********************************************************************************************************//

    public function bestimprovementinrankttl() {
        $employeepl1 = BestImprovementInRank::where('enable', 1)->where('plantation_id', 2)->get();
        return view('signage.bestimprovementinrank.ttl', array('responsespl1' => $employeepl1));
    }

    public function bestimprovementinrankkvpl() {
        $employeepl1 = BestImprovementInRank::where('enable', 1)->where('plantation_id', 1)->get();
        return view('signage.bestimprovementinrank.kvpl', array('responsespl1' => $employeepl1));
    }

//**********************************************************************************************************//
//All Time Record Prices
//**********************************************************************************************************//

    public function alltimerecordpricesttl() {
        $employeepl1 = AllTimeRecordPrices::where('enable', 1)->where('plantation_id', 2)->get();
        return view('signage.alltimerecordprices.ttl', array('responsespl1' => $employeepl1));
    }

    public function balltimerecordpriceskvpl() {
        $employeepl1 = AllTimeRecordPrices::where('enable', 1)->where('plantation_id', 1)->get();
        return view('signage.alltimerecordprices.kvpl', array('responsespl1' => $employeepl1));
    }

//**********************************************************************************************************//
//Top Price
//**********************************************************************************************************//

    public function toppricettl() {
        $employeepl1 = TopPrice::where('enable', 1)->where('plantation_id', 2)->get();
        return view('signage.topprices.ttl', array('responsespl1' => $employeepl1));
    }

    public function toppricekvpl() {
        $employeepl1 = TopPrice::where('enable', 1)->where('plantation_id', 1)->get();
        return view('signage.topprices.kvpl', array('responsespl1' => $employeepl1));
    }

//**********************************************************************************************************//
//Hayles Logo page
//**********************************************************************************************************//
    public function firstpage() {
        return view('signage.haylesFirstpage.index');
    }

//**********************************************************************************************************//
//Hayles and other plantation details with logo
//**********************************************************************************************************//
    public function second() {
        return view('signage.haylesSecoundpage.index');
    }

//**********************************************************************************************************//
    public function image() {
        return view('admin.employee.imageupload');
    }
    
//**********************************************************************************************************//
//news Feed
//**********************************************************************************************************//
    public function newsfeed() {
        $newsfeed = Rss::whereDate('startdate', '<=', date('Y-m-d'))->whereDate('enddate', '>=', date('Y-m-d'))->get();
        return view('signage.newsfeed.index', array('responses' => $newsfeed));
    }
    
    public function loadevideo(){
        $videos = Video::where('status',1)->get();
        return view('signage.video.index', array('videos' => $videos));
    }
    
//**********************************************************************************************************//
//Marketing slides
//**********************************************************************************************************//
    public function mar1() {
        return view('signage.marketing.mar1');
    }
    public function mar2() {
        return view('signage.marketing.mar2');
    }
    public function mar3() {
        return view('signage.marketing.mar3');
    }
    public function mar4() {
        return view('signage.marketing.mar4');
    }
    public function mar5() {
        return view('signage.marketing.mar5');
    }
    public function mar6() {
        return view('signage.marketing.mar6');
    }
    public function mar7() {
        return view('signage.marketing.mar7');
    }
    public function mar8() {
        return view('signage.marketing.mar8');
    }
    public function mar9() {
        return view('signage.marketing.mar9');
    }
    public function mar10() {
        return view('signage.marketing.mar10');
    }
    public function mar11() {
        return view('signage.marketing.mar11');
    }
    public function mar12() {
        return view('signage.marketing.mar12');
    }
    public function mar13() {
        return view('signage.marketing.mar13');
    }
    public function mar14() {
        return view('signage.marketing.mar14');
    }
    public function mar15() {
        return view('signage.marketing.mar15');
    }
    public function mar16() {
        return view('signage.marketing.mar16');
    }
    
    public function mar17() {
        return view('signage.marketing.mar17');
    }

    public function mar18() {
        return view('signage.marketing.mar18');
    }
    public function mar19() {
        return view('signage.marketing.mar19');
    }
    
//**********************************************************************************************************//
//Best Improvement in Rank Tea Factories 
//**********************************************************************************************************//

    public function bestimprovementinrankteafactoryttl() {
        $employeepl1 = Bestimprovementinrankteafactory::where('enable', 1)->where('plantation_id', 2)->get();
        return view('signage.bestimprovementinrankteafactory.ttl', array('responsespl1' => $employeepl1));
    }

    public function bestimprovementinrankteafactorykvpl() {
        $employeepl1 = Bestimprovementinrankteafactory::where('enable', 1)->where('plantation_id', 1)->get();
        return view('signage.bestimprovementinrankteafactory.kvpl', array('responsespl1' => $employeepl1));
    }
        
}