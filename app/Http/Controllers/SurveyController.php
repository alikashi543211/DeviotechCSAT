<?php

namespace App\Http\Controllers;

use App\Models\VisitType;
use Illuminate\Http\Request;
use App\Models\ClientRecord;
use App\Models\CareGiverRecord;
use App\Models\User;
use App\Models\Category;
use App\Models\County;
use App\Models\Diagnose;
use PDF;
use Excel;
use App\Exports\ClientRecordExport;
use App\Exports\SingleExcelExport;
use Carbon\Carbon;
use App\Models\Client;

class SurveyController extends Controller
{
	public function adminList(Request $request)
	{
		//dd($request->all());
		$types = Category::get(['category']);
		$counties = County::all();
		$client_list = Client::distinct()->get(['name']);
		$conditions = Diagnose::all();
		$managers = User::where('role', 'care_manager')->withTrashed()->get();

		//$clients = ClientRecord::with('care_giver_records');

		$clients = ClientRecord::where("form_status", "2")
		            ->orderBy('id', 'DESC')
			        ->with('care_giver_records');

		if ($request->type && $request->type != "all") {
			$clients->where('category', $request->type);
		}
		if ($request->condition  && $request->condition != "all") {
			$clients->where('client_health_diagnose', $request->condition);
		}
		if ($request->county  && $request->county != "all") {
			$clients->where('county', $request->county);
		}
		if ($request->nps && $request->nps != 'all') {
			$clients->where('nps', $request->nps);
		}
		if ($request->care_mgr_id  && $request->care_mgr_id != "all") {
			$clients->where('care_manager_id', $request->care_mgr_id);
		}

		if ($request->client && $request->client != 'all') {
			$clients->where('client_name', $request->client);
		}

		if ($request->client_id) {
			$clients->where('client_number', $request->client_id);
		}

		if (isset($request->from) && isset($request->to)) {
			$clients = $clients->whereBetween('created_at', array($request->from, $request->to));
		} else if (isset($request->from) && !isset($request->to)) {
			$clients = $clients->where('created_at', '>', $request->from);
		} else if (!isset($request->from) && isset($request->to)) {
			$clients = $clients->where('created_at', '<', $request->to);
		}
		$clients = $clients->get();
		if ($request->export) {
			return Excel::download(new ClientRecordExport($clients), 'clients-survey.xlsx');
		}

		return view('survey.list', get_defined_vars());
	}

	public function drafts(Request $request)
	{
		$types = Category::get(['category']);
		$counties = County::all();
		$client_list = Client::distinct()->get(['name']);
		$conditions = Diagnose::all();
		$managers = User::where('role', 'care_manager')->withTrashed()->get();
		$clients = ClientRecord::where("form_status", "1")
			->with('care_giver_records');

		if ($request->type && $request->type != "all") {
			$clients->where('category', $request->type);
		}
		if ($request->condition  && $request->condition != "all") {
			$clients->where('client_health_diagnose', $request->condition);
		}
		if ($request->county  && $request->county != "all") {
			$clients->where('county', $request->county);
		}
		if ($request->nps && $request->nps != 'all') {
			$clients->where('nps', $request->nps);
		}
		if ($request->care_mgr_id  && $request->care_mgr_id != "all") {
			$clients->where('care_manager_id', $request->care_mgr_id);
		}

		if ($request->client && $request->client != 'all') {
			$clients->where('client_name', $request->client);
		}

		if ($request->client_id) {
			$clients->where('client_number', $request->client_id);
		}

		if (isset($request->from) && isset($request->to)) {
			$clients = $clients->whereBetween('created_at', array($request->from, $request->to));
		} else if (isset($request->from) && !isset($request->to)) {
			$clients = $clients->where('created_at', '>', $request->from);
		} else if (!isset($request->from) && isset($request->to)) {
			$clients = $clients->where('created_at', '<', $request->to);
		}
		$clients = $clients->get();
		if ($request->export) {
			return Excel::download(new ClientRecordExport($clients), 'clients-draft.xlsx');
		}

		return view('survey.drafts', get_defined_vars());
	}

	public function singleExcel($id)
	{
		$clients = ClientRecord::where('id', $id)->get();
		return Excel::download(new SingleExcelExport($clients), 'clients-survey.xlsx');
	}

	public function mngList()
	{
		//retun view('');
	}

	public function pdf($id)
	{
		$clients = ClientRecord::where('id', $id)->first();
		// dd($clients->starlift_service_date);
		$care_giver_name = CareGiverRecord::where('client_id', $clients->id)->get();
		//return view('exports.survey_pdf', get_defined_vars());
		$pdf = PDF::loadView('exports.survey_pdf', get_defined_vars());
		return $pdf->download($clients->client_name . '-' . $clients->client_dob . ".pdf");
	}

	public function delete($id)
	{
		$survey = ClientRecord::where('id', $id)->first();
		$survey->care_giver_records()->delete();
		$survey->delete();
		return back()->with('success', 'Survey Record has been deleted');
	}
}
