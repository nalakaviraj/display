<?php

namespace App\Http\Controllers;

use App\Division;
use App\Employee;
use App\Estate;
use App\ClientUrl;
use App\Schedule;
use App\Price;
use App\UserType;
use App\Region;
use App\BestProfitPerHect;
use App\BestImprovementOnprofitPerHect;
use App\TopPrice;
use App\BestImprovementInRank;
use App\HighestYph;
use App\HighestRevenuePerHect;
use App\Bestimprovementinrankteafactory;
use App\Video;
use App\TblScreen;
use App\TblCounter;
use App\Plantation;
use App\AllTimeRecordPrices;
use App\BestYphRankImprovement;
use App\Resources;


use Illuminate\Http\Request;

class EstateControllerN extends Controller
{
  
    public function index()
    {
     
    }

    public function getEstates()
    {
        $data  = Estate::get();
		echo $data;
    }
	
	public function getDivisions()
    {
        $data  = Division::get();
		echo $data;
    }
	
	public function getEmployees()
    {
        $data  = Employee::get();
		echo $data;
    }
	
	public function getClientUrls()
    {
        $data  = ClientUrl::get();
		echo $data;
    }
	
	public function getSchedules()
    {
        $data  = Schedule::get();
		echo $data;
    }
	
	public function getPrices()
    {
        $data  = Price::get();
		echo $data;
    }
	
	public function getUsertypes()
    {
        $data  = UserType::get();
		echo $data;
    }
	
	public function getRegions()
    {
        $data = Region::get();
		echo $data;
    }
	

	
	public function getBestImprovementOnprofitPerHects()
    {
        $data = BestImprovementOnprofitPerHect::get();
		echo $data;
    }
	
	public function getTopPrices()
    {
        $data = TopPrice::get();
		echo $data;
    }
	
	public function getBestImprovementInRanks()
    {
        $data = BestImprovementInRank::get();
		echo $data;
    }
	
	public function getHighestYphs()
    {
        $data = HighestYph::get();
		echo $data;
    }
	
	public function getHighestRevenuePerHects()
    {
        $data = HighestRevenuePerHect::get();
		echo $data;
    }
	
	public function getBestImprovementInrankTeaFactories()
    {
        $data = Bestimprovementinrankteafactory::get();
		echo $data;
    }
	
	public function getVideos()
    {
        $data = Video::get();
		echo $data;
    }
	
	public function getTblScreens()
    {
        $data = TblScreen::get();
		echo $data;
    }
	
	public function getTblCounters()
    {
        $data = TblCounter::get();
		echo $data;
    }
	
	public function getplantations()
    {
        $data = Plantation::get();
		echo $data;
    }
	
	public function getAllTimeRecordPrices()
    {
        $data = AllTimeRecordPrices::get();
		echo $data;
    }
	
	public function getBestYphRankImprovements()
    {
        $data = BestYphRankImprovement::get();
		echo $data;
    }
	
	public function getResources()
    {
        $data = Resources::get();
		echo $data;
    }
	
	public function getBestProfitPerHects()
    {
        $data = BestProfitPerHect::get();
		echo $data;
    }
	

}
