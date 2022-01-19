<?php

namespace App\Http\Controllers\Form;

use App\Http\Controllers\Controller;
use App\Models\Assistance;
use App\Models\Category;
use App\Models\Client;
use App\Models\County;
use App\Models\Diagnose;
use App\Models\Expectation;
use App\Models\Quality;
use App\Models\User;
use App\Models\VisitType;
use App\Models\WHO;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;

use App\Models\ClientRecord;
use App\Models\CareGiverRecord;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FormController extends Controller
{
    public function index()
    {
        if (Auth::check())
        {
            $user=auth()->user();
            if($user->role=='admin')
            {
                return redirect(RouteServiceProvider::ADMIN);
            }
            elseif ($user->role=='ops_manager')
            {
                return redirect(RouteServiceProvider::ADMIN);
            }
            elseif ($user->role=='care_manager')
            {
                return redirect(RouteServiceProvider::CAREMANAGER);
            }
        }
        return redirect()->route('login');
    }

    public function fromLink(Request $request)
    {
        //dd($request->all());
        $fullUrl = \Request::fullUrl();
        // dd($fullUrl);
        $client = Client::where('id', base64_decode($request->c))->first();
        $care_manager = User::withTrashed()->where('id', base64_decode($request->care_m))->first();
        // dd($request->c, $client, $care_manager);
        // $client = null;
        if ($client == null || $care_manager == null) {
            abort(403);
        }

        $who=WHO::where('status',true)->get();
        $expectations=Expectation::where('status',true)->get();
        $quality=Quality::where('status',true)->get();
        $assistance=Assistance::where('status',true)->get();
        $care_manager = User::where('role', 'care_manager')->get();
        $categories = Category::where('status', true)->get();
        $visit_type = VisitType::where('status', true)->get();
        $counties = County::where('status', true)->get();
        $diagnoses = Diagnose::where('status', true)->get();

        if(isset($request->status))
        {
            $clientRecord = ClientRecord::find($request->status);
            return view('form.draft', get_defined_vars());
        }
        return view('form.index', get_defined_vars());
    }

    public function formSubmit(Request $request)
    {
        $cl = Client::where('id_number',$request->client_number)->first();
        $eircode=$cl->eircode;

        $nps='Passive';
        if ($request->adv_rec>=9 && $request->adv_rec<= 10)
        {
            $nps='Promoter';
        }
        elseif ($request->adv_rec>6 && $request->adv_rec<9)
        {
            $nps='Passive';
        }
        elseif($request->adv_rec>=0 && $request->adv_rec<=6){
            $nps='Detractor';
        }

        if(isset($request->client_record_id))
        {
            $client_record = ClientRecord::find($request->client_record_id);
        }else
        {
            $client_record = new ClientRecord();
        }
        $client_record->client_id = $cl->id;
        $client_record->qa_visit_date = Carbon::parse($request->qa_visit_date)->format('Y-m-d');
        $client_record->category = $request->category;
        $client_record->visit_type = $request->visit_type;
        $client_record->county = $request->county;
        $client_record->locality = $request->locality;
        $client_record->province = $request->province;
        $client_record->client_id_number = $request->client_id;
        $client_record->client_number = $request->client_number;
        $client_record->client_health_diagnose = $request->client_health_diagnose;
        $client_record->client_name = $request->client_name;
        $client_record->client_dob =  Carbon::parse($request->client_dob)->format('Y-m-d');
        $client_record->care_start_date = Carbon::parse($request->care_start_date)->format('Y-m-d');
        $client_record->duration_of_visit = $request->duration_of_visit;
        if ($request->Signatur_Data) {
            $client_sig = uploadSignature($request->Signatur_Data);
            $client_record->client_signatue = $client_sig;
        }
        if ($request->Signatur_Data_2) {
            $caremanager_sig = uploadSignature($request->Signatur_Data_2);
            $client_record->caremanager_signatue = $caremanager_sig;
        }
        $client_record->care_manager_id = $request->care_manager_id;
        $client_record->care_manager = $request->care_manager;
        $client_record->cm_attitud = $request->Cm_attitud;
        $client_record->cm_ability = $request->Cm_ability;
        $client_record->cm_reliability = $request->Cm_reliability;
        $client_record->cm_comment = $request->Cm_comment;
        $client_record->cm_average = $request->Cm_average;
        $client_record->off_help = $request->Off_help;
        $client_record->off_service = $request->Off_service;
        $client_record->off_communication = $request->Off_communication;
        $client_record->off_average = $request->Off_average;
        $client_record->off_comment = $request->Off_comment;
        $client_record->csat = $request->CSAT;
        $client_record->who = $request->Who;
        $client_record->adv_name = $request->adv_name;
        $client_record->expectations = $request->Expectations;
        $client_record->adv_disc = $request->adv_disc;
        $client_record->adv_rec = $request->adv_rec;
        $client_record->adv_comment = $request->adv_comment;
        $client_record->quality_of_life = $request->Quality_of_Life;
        $client_record->cp_details = $request->Cp_details;
        $client_record->review_care_needs = $request->review_care_needs;
        $client_record->review_care_plan = $request->review_care_plan;
        $client_record->expand_on_unmet_needs = $request->expand_on_unmet_needs;
        $client_record->add_other_yes = $request->add_other_yes;
        $client_record->add_other = $request->add_other;
        $client_record->cg_meals = $request->Cg_meals;
        $client_record->medi_set_type = $request->Medi_set_type;
        $client_record->cg_hm_key = $request->Cg_hm_key;
        $client_record->cg_hm_key_sign = $request->Cg_hm_key_sign;
        $client_record->cg_key_info = $request->Cg_key_info;
        $client_record->cg_key_info_safe = $request->Cg_key_info_safe;
        $client_record->bath_hoist = $request->bath_hoist; 
        if($request->bath_hoist == "yes")
        {
            $client_record->bt_hoist_service_date = $request->bt_hoist_service_date;
        }
        $client_record->starlift = $request->starlift;
        if($request->starlift == "yes")
        {
            $client_record->starlift_service_date = $request->starlift_service_date;
        }
        $client_record->hoist = $request->hoist;
        if ($request->hoist_service_date!==null)
        {
            $client_record->hoist_service_date = Carbon::parse($request->hoist_service_date)->format('Y-m-d');
        }

        $client_record->profile_bed = $request->profile_bed;
        if($client_record->profile_bed == 'yes')
        {
            $client_record->profile_service_date = Carbon::parse($request->profile_service_date)->format('Y-m-d');
        }
        $client_record->ewchair = $request->Ewchair;
        if($client_record->ewchair == 'yes')
        {
            $client_record->wheelchair_service_date = Carbon::parse($request->wheelchair_service_date)->format('Y-m-d');
        }
        $client_record->sr_other = $request->Sr_other;
        $client_record->sr_follow_up = $request->Sr_follow_up;
        $client_record->hygine = $request->Hygine;
        $client_record->hygine_detail = $request->Hygine_detail;
        $client_record->cjournal = $request->Cjournal;
        $client_record->cj_detail = $request->Cj_detail;
        $client_record->pref_sheet = $request->pref_sheet;
        $client_record->pref_sheet_detail = $request->Pref_sheet_detail;
        $client_record->refill = $request->refill;
        $client_record->refill_detail = $request->refill_detail;
        $client_record->guidline = $request->guidline;
        $client_record->guidline_detail = $request->guidline_detail;
        $client_record->time_in = $request->time_in;
        $client_record->time_in_detail = $request->time_in_detail;
        $client_record->cg_content_log = $request->Cg_content_log;
        $client_record->cg_content_log_detail = $request->Cg_content_log_detail;
        $client_record->cj_comment = $request->Cj_comment;
        $client_record->compatible = $request->Compatible;
        $client_record->compatible_detail = $request->Compatible_detail;
        $client_record->dependable = $request->dependable;
        $client_record->dependable_detail = $request->dependable_detail;
        $client_record->capable = $request->capable;
        $client_record->capable_detail = $request->capable_detail;
        $client_record->recomm = $request->recomm;
        $client_record->dementia = $request->Dementia;
        $client_record->pmh = $request->pmh;
        $client_record->cater_care = $request->Cater_care;
        $client_record->per_care = $request->per_care;
        $client_record->meal_prep = $request->meal_prep;
        $client_record->st_care = $request->st_care;
        $client_record->pp_update = $request->pp_update;
        $client_record->pp_date = Carbon::parse($request->pp_date)->format('Y-m-d');
        $client_record->train_other = $request->train_other;
        $client_record->train_note = $request->train_note;
        $client_record->care_giver = $request->Care_Giver;
        $client_record->dementia_name = $request->Dementia_Name;
        $client_record->pm_name = $request->PM_Name;
        $client_record->cater_carers_name = $request->CATER_Carers_Name;
        $client_record->personal_care_name = $request->Personal_Care_Name;
        $client_record->meal_preprations_name = $request->Meal_Preprations_Name;
        $client_record->stoma_care_name = $request->Stoma_Care_Name;
        $client_record->agree_update_next_schedule = $request->agree_update_next_schedule;
        $client_record->eircode = $eircode;
        $client_record->nps = $nps;
        $client_record->form_status = $request->form_status; 
        $client_record->save();
        CareGiverRecord::where('client_id',$client_record->id)->delete();
        
        for ($i = 0; $i < count($request->care_giver_name); $i++) {
            if ($request->care_giver_name[$i] !== null)
            {
                $care_giver_record = new CareGiverRecord();
                $care_giver_record->care_giver_id = $request->care_giver_id[$i];
                $care_giver_record->care_giver_name = $request->care_giver_name[$i];
                $care_giver_record->attitude = $request->attitude[$i];
                $care_giver_record->ability = $request->ability[$i];
                $care_giver_record->reliability = $request->reliability[$i];
                $care_giver_record->average_giver = $request->Average_giver[$i];
                $care_giver_record->cg_comment = $request->CG_comment[$i];
                $care_giver_record->average_giver_total = $request->Average_giver_total;
                $care_giver_record->client_id = $client_record->id;
                $care_giver_record->save();
            }
        }
        $clientRecordId = base64_encode($client_record->id);
        $record_id = $client_record->id;
        $msg = ['id'=>$clientRecordId, 'form_status'=>$client_record->form_status, 'record_id' => $record_id];
        return response()->json($msg);
    }

    public function success()
    {
        return view('form.success');
    }

    public function error()
    {
        return view('form.error');
    }

    public function changeRedirection(Request $req)
    {
        $client = ClientRecord::find($req->id);
        return redirect()->route('client.form.link', ['status'=>$client->id, 'c'=>$client->client_id ?? '','care_m'=>$client->care_manager_id]);
    }
}