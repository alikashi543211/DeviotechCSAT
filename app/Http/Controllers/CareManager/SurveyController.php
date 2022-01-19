<?php

namespace App\Http\Controllers\CareManager;

use App\Exports\ClientRecordExport;
use App\Exports\SingleExcelExport;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ClientRecord;
use App\Models\County;
use App\Models\Diagnose;
use App\Models\User;
use App\Models\VisitType;
use Illuminate\Http\Request;
use App\Models\Client;
use Excel;
use PDF;

class SurveyController extends Controller
{
    public function list(Request $request)
    {
        $types = Category::all();
        $counties = County::all();
        $client_list = Client::distinct()->get(['name']);
        $conditions = Diagnose::all();

        $clients = ClientRecord::where('care_manager_id', auth()->user()->id)
                    ->orderBy('id', 'DESC')
                    ->with('care_giver_records');

        //$clients = ClientRecord::with('care_giver_records');

        if ($request->type && $request->type != 'all') {
            $clients->where('category', $request->type);
        }
        if ($request->condition && $request->condition != 'all') {
            $clients->where('client_health_diagnose', $request->condition);
        }
        if ($request->county && $request->county != 'all' ) {
            $clients->where('county', $request->county);
        }
        if ($request->nps && $request->nps != 'all') {
            $clients->where('nps', $request->nps);
        }
        if ($request->care_mgr_id  && $request->care_mgr_id != 'all') {
            $clients->where('care_manager_id', $request->care_mgr_id);
        }

        if ($request->client && $request->client != 'all') {
            $clients->where('client_name', $request->client);
        }

        if ($request->client_id) {
            $clients->where('client_number', $request->client_id);
        }
        if(isset($request->from) && isset($request->to)) {
            $clients = $clients->whereBetween('created_at',array($request->from,$request->to));
        } else if(isset($request->from) && !isset($request->to)) {
            $clients = $clients->where('created_at','>',$request->from);
        } else if(!isset($request->from) && isset($request->to)) {
            $clients = $clients->where('created_at','<',$request->to);
        }
        $clients = $clients->get();
        if($request->export)
        {
            return Excel::download(new ClientRecordExport($clients), 'clients-survey.xlsx');
        }

        return view('care-manager.survey.list', get_defined_vars());
    }

    public function singleExcel($id)
    {
        $clients=ClientRecord::where('id',$id)->where('care_manager_id',auth()->user()->id)->get();
        return Excel::download(new SingleExcelExport($clients), 'clients-survey.xlsx');
    }
    
    public function delete($id)
    {
        $survey = ClientRecord::findOrFail($id);
        $survey->care_giver_records()->delete();
        $survey->delete();
        return back()->with('success', 'Survey Record has been deleted');
    }
}
