<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClientRecord;
use Carbon\Carbon;

class AdminController extends Controller
{
	public function dashboard(Request $req)
	{
	    if(isset($req->show) && $req->show == 'month')
		{
			//Today
			$no_of_visits = ClientRecord::where("form_status", "2")->whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->count();

			$csat_avg = ClientRecord::where("form_status", "2")->whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->sum('csat') ?? 0;

			if($no_of_visits != 0){
				$csat_avg = $csat_avg / $no_of_visits;
			}
			else
				$csat_avg = 0;	
			if($no_of_visits != 0)
			{
				$no_of_detractor = ( ClientRecord::where("form_status", "2")->where('nps', 'Detractor')
					->whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])
					->count() / $no_of_visits ) * 100;
				$no_of_promoter = ( ClientRecord::where("form_status", "2")->where('nps', 'Promoter')
					->whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])
					->count() / $no_of_visits ) * 100;

				$nps = round($no_of_promoter - $no_of_detractor);
			}else
			{
				$no_of_detractor = 0;
				$no_of_promoter = 0;
				$nps = 0;
			}
		}elseif (isset($req->show) && $req->show == 'quarter') 
		{
			$date = new \Carbon\Carbon();
			$last = $date->lastOfQuarter()->format('Y-m-d H:i:s');
			$first = $date->firstOfQuarter()->format('Y-m-d H:i:s');
			//This Quarter
			$no_of_visits = ClientRecord::where("form_status", "2")->whereBetween('created_at', [$first, $last])->count();

			$csat_avg = ClientRecord::where("form_status", "2")->whereBetween('created_at', [$first, $last])->sum('csat') ?? 0;

			if($no_of_visits != 0){
				$csat_avg = $csat_avg / $no_of_visits;
			}
			else
				$csat_avg = 0;	
			if($no_of_visits != 0)
			{
				$no_of_detractor = ( ClientRecord::where("form_status", "2")->where('nps', 'Detractor')
					->whereBetween('created_at', [$first, $last])
					->count() / $no_of_visits ) * 100;
				$no_of_promoter = ( ClientRecord::where("form_status", "2")->where('nps', 'Promoter')
					->whereBetween('created_at', [$first, $last])
					->count() / $no_of_visits ) * 100;

				$nps = round($no_of_promoter - $no_of_detractor);
			}else
			{
				$no_of_detractor = 0;
				$no_of_promoter = 0;
				$nps = 0;
			}
		}
		else
		{
			// This Year
			$no_of_visits = ClientRecord::where("form_status", "2")->whereBetween('created_at', [Carbon::now()->startOfYear(), Carbon::now()])
			->count();
			$csat_avg = ClientRecord::where("form_status", "2")->whereBetween('created_at', [Carbon::now()->startOfYear(), Carbon::now()])
			->sum('csat') ?? 0;
			if($no_of_visits != 0){
				$csat_avg = $csat_avg / $no_of_visits;
			}
			else
				$csat_avg = 0;	
			if($no_of_visits != 0)
			{
				$no_of_detractor = ( ClientRecord::where("form_status", "2")->where('nps', 'Detractor')
					->whereBetween('created_at', [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])
					->count() / $no_of_visits ) * 100;

				$no_of_promoter = ( ClientRecord::where("form_status", "2")->where('nps', 'Promoter')
					->whereBetween('created_at', [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])
					->count() / $no_of_visits ) * 100;
				$nps = round($no_of_promoter - $no_of_detractor);
			}else
			{
				$no_of_detractor = 0;
				$no_of_promoter = 0;
				$nps = 0;
			}
		}
		return view('admin.dashboard', get_defined_vars());
	}
}
