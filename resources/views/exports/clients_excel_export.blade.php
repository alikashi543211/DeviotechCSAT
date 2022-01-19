<table>
    <thead>
    <tr>
        <th>Visit ref number</th>
        <th>Date</th>
        <th>Week</th>
        <th>Month</th>
        <th>Year</th>
        <th>Category</th>
        <th>Visit Type</th>
        <th>County</th>
        <th>Locality</th>
        <th>Province</th>
        <th>Eircode</th>
        <th>Clients Number</th>
        <th>Clients Name</th>
        <th>Clients DOB</th>
        <th>Care Start Date</th>
        <th>Duration of Visit</th>
        <th>Clients Health Diagnosis</th>
        <th>Clients Signature</th>
        <th>CareManager</th>
        <th>CareManger Signature</th>
        <th>CareGiver 1</th>
        <th>Kind and Caring Attitude?</th>
        <th>Competent ; Ability to Perform Care Needs?</th>
        <th>Punctual , Reliable, and Dependable?</th>
        <th>Average</th>
        <th>Comment</th>
        <th>CareGiver 2</th>
        <th>Kind and Caring Attitude?</th>
        <th>Competent ; Ability to Perform Care Needs?</th>
        <th>Punctual , Reliable, and Dependable?</th>
        <th>Average</th>
        <th>Comment</th>
        <th>CareGiver 3</th>
        <th>Kind and Caring Attitude?</th>
        <th>Competent ; Ability to Perform Care Needs?</th>
        <th>Punctual , Reliable, and Dependable?</th>
        <th>Average</th>
        <th>Comment</th>
        <th>CareGiver 4</th>
        <th>Kind and Caring Attitude?</th>
        <th>Competent ; Ability to Perform Care Needs?</th>
        <th>Punctual , Reliable, and Dependable?</th>
        <th>Average</th>
        <th>Comment</th>
        <th>Total average CAREGivers (auto)Average</th>
        <th>CAREManager</th>
        <th>Kind and caring attitude?</th>
        <th>Competent , Ability to Perform Care Needs?</th>
        <th>Punctual , Reliable and Dependable?</th>
        <th>Comment</th>
        <th>Average CAREManager</th>
        <th>Courteous and helpful?</th>
        <th>Provide prompt service with enquiries / requests ?</th>
        <th>Competent and Communicates Scheduling</th>
        <th>Average Office Support</th>
        <th>Comment</th>
        <th>CSAT%</th>
        <th>Who</th>
        <th>Name</th>
        <th>Expectations</th>
        <th>Value Of Service</th>
        <th>Likely to Recommend HISC</th>
        <th>Ref</th>
        <th>NPS Breakdown</th>
        <th>Promoter</th>
        <th>Passive</th>
        <th>Detractor</th>
        <th>Comment</th>
        <th>Quality of Life</th>
        <th>Details Of client profile changes</th>
        <th>Review care needs</th>
        <th>Review care plan</th>
        <th>Expand on unmet needs</th>
        <th>Other services requiring assistance Y/N</th>
        <th>Other service assistance</th>
        <th>AGREE UPDATED SCHEDULE/CAPTURE NEXT STEPS</th>
        <th>Do CAREGivers Deal With Meds</th>
        <th>Medi Set Type</th>
        <th>Do CAREGivers Have a Home Key </th>
        <th>Key form Signed</th>
        <th>Key Safe Information Provided</th>
        <th>Client Key Safe</th>
        <th>Bath Hoist</th>
        <th>Service Date</th>
        <th>Stairlift</th>
        <th>Stairlift service date</th>
        <th>Hoist</th>
        <th>Hoist service date</th>
        <th>Profile Bed</th>
        <th>Profile Bed Service Date</th>
        <th>E Wheelchair</th>
        <th>E Wheelchair Service Date</th>
        <th>Other</th>
        <th>Followup Action</th>
        <th>Home Environment Safe and Hygienic</th>
        <th>Home Env Details</th>
        <th>Client Journal Accessible</th>
        <th>Journal Details</th>
        <th>Preference Sheets Done</th>
        <th>Preference Sheet Details</th>
        <th>Logs Removed / Binder Refill</th>
        <th>Logs and Binder Details</th>
        <th>Journal meds guidelines</th>
        <th>Journal Meds Details</th>
        <th>Time In / Time Out Recorded Ok</th>
        <th>Time In / Out Details</th>
        <th>CAREGiver Content Log Ok</th>
        <th>CAREGiver Content Details</th>
        <th>Comment</th>
        <th>Compatible / Communicates with Client</th>
        <th>Details</th>
        <th>Reliable and Dependable</th>
        <th>Details</th>
        <th>Capable of Providing Req'd Care</th>
        <th>DetailsDH1</th>
        <th>Recommendable for more Hrs</th>
        {{--<th>Dementia</th>
        <th>Care Giver Name</th>
        <th>PM and H</th>
        <th>CAREGiver Name</th>
        <th>Cater Care</th>
        <th>CAREGiver Name</th>
        <th>Personal Care</th>
        <th>CAREGiver Name</th>--}}
        <th>Meal Preprations</th>
        <th>CAREGiver Name</th>
        <th>Stoma Care</th>
        <th>CAREGiver Name</th>
        <th>PP Updated</th>
        <th>Date</th>
        <th>Other</th>
        <th>Notes</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($clients as $client)
        <tr>
            <td>{{$client->id ?? ''}}</td>
            <td>{{date('d-M-y',strtotime($client->qa_visit_date))}}</td>
            <td>{{date('W',strtotime($client->qa_visit_date))}}</td>
            <td>{{date('M',strtotime($client->qa_visit_date))}}</td>
            <td>{{date('Y',strtotime($client->qa_visit_date))}}</td>
            <td>{{ $client->category ?? '' }}</td>
            <td>{{$client->visit_type}}</td>
            <td>{{$client->county}}</td>
            <td>{{$client->locality}}</td>
            <td>{{$client->province}}</td>
            <td>{{$client->eircode}}</td>
            <td>{{$client->client_number ?? ""}}</td>
            <td>{{$client->client_name ?? ""}}</td>
            <td>{{date('d-M-y',strtotime($client->client_dob))}}</td>
            <td>{{date('d-M-y',strtotime($client->care_start_date))}}</td>
            <td>{{$client->duration_of_visit ?? ""}}</td>
            <td>{{$client->client_health_diagnose ?? ""}}</td>
            <td></td>
            <td>{{$client->care_manager}}</td>
            <td></td>
            <td>{{$client->care_giver_records[0]->care_giver_name??''}}</td>
            <td>{{$client->care_giver_records[0]->attitude??''}}</td>
            <td>{{$client->care_giver_records[0]->ability??''}}</td>
            <td>{{$client->care_giver_records[0]->reliability??''}}</td>
            <td>{{$client->care_giver_records[0]->average_giver??''}}</td>
            <td>{{$client->care_giver_records[0]->cg_comment??''}}</td>
            <td>{{$client->care_giver_records[1]->care_giver_name??''}}</td>
            <td>{{$client->care_giver_records[1]->attitude??''}}</td>
            <td>{{$client->care_giver_records[1]->ability??''}}</td>
            <td>{{$client->care_giver_records[1]->reliability??''}}</td>
            <td>{{$client->care_giver_records[1]->average_giver??''}}</td>
            <td>{{$client->care_giver_records[1]->cg_comment??''}}</td>
            <td>{{$client->care_giver_records[2]->care_giver_name??''}}</td>
            <td>{{$client->care_giver_records[2]->attitude??''}}</td>
            <td>{{$client->care_giver_records[2]->ability??''}}</td>
            <td>{{$client->care_giver_records[2]->reliability??''}}</td>
            <td>{{$client->care_giver_records[2]->average_giver??''}}</td>
            <td>{{$client->care_giver_records[2]->cg_comment??''}}</td>
            <td>{{$client->care_giver_records[3]->care_giver_name??''}}</td>
            <td>{{$client->care_giver_records[3]->attitude??''}}</td>
            <td>{{$client->care_giver_records[3]->ability??''}}</td>
            <td>{{$client->care_giver_records[3]->reliability??''}}</td>
            <td>{{$client->care_giver_records[3]->average_giver??''}}</td>
            <td>{{$client->care_giver_records[3]->cg_comment??''}}</td>
            <td>{{$client->care_giver_records[0]->average_giver_total??''}}</td>
            <td>{{$client->care_manager}}</td>
            <td>{{$client->Cm_attitud}}</td>
            <td>{{$client->Cm_ability}}</td>
            <td>{{$client->Cm_reliability}}</td>
            <td>{{$client->Cm_comment}}</td>
            <td>{{$client->Cm_average}}</td>
            <td>{{$client->Off_help}}</td>
            <td>{{$client->Off_service}}</td>
            <td>{{$client->Off_communication}}</td>
            <td>{{$client->Off_average}}</td>
            <td>{{$client->Off_comment}}</td>
            <td>{{$client->csat}}</td>
            <td>{{$client->who}}</td>
            <td>{{$client->adv_name}}</td>
            <td>{{$client->expectations}}</td>
            <td>{{$client->adv_disc}}</td>
            <td>{{$client->adv_rec}}</td>
            <td>1</td>
            <td>{{$client->nps}}</td>
            <td>{{$client->nps=='Promoter'?1:''}}</td>
            <td>{{$client->nps=='Passive'?1:''}}</td>
            <td>{{$client->nps=='Detractor'?1:''}}</td>
            <td>{{$client->adv_comment}}</td>
            <td>{{$client->quality_of_Life}}</td>
            <td>{{$client->cp_details}}</td>
            <td>{{$client->review_care_needs ?? ""}}</td>
            <td>{{$client->review_care_plan ?? ""}}</td>
            <td>{{$client->expand_on_unmet_needs ?? ""}}</td>
            <td>{{$client->add_other_yes ?? ""}}</td>
            <td>{{$client->add_other ?? ""}}</td>
            <td>{{$client-> agree_update_next_schedule?? ""}}</td>
            <td>{{$client->cg_meals ?? ""}}</td>
            <td>{{$client->medi_set_type ?? ""}}</td>


            <td>{{$client->cg_hm_key ?? ""}}</td>
            <td>{{$client->cg_hm_key_sign ?? ''}}</td>
            <td>{{$client->cg_key_info ?? ''}}</td>
            <td>{{$client->cg_key_info_safe ?? ''}}</td>
            <td>{{$client->bath_hoist ?? ''}}</td>
            <td>{{$client->bt_hoist_service_date ?? ""}}</td>
            <td>{{$client->starlift ?? ""}}</td>
            <td>
                @if($client->starlift != 'No')
                    {{ \Carbon\Carbon::parse($client->starlift_service_date)->format('d-M-y') }}
                @else
                
                @endif
            </td>
            <td>{{$client->hoist ?? ""}}</td>
            <td>
                @if($client->hoist != 'No')
                    {{ \Carbon\Carbon::parse($client->hoist_service_date)->format('d-M-y') }}
                @else
                
                @endif
            </td>
            <td>{{$client->profile_bed ?? ""}}</td>
            <td>
                @if($client->profile_bed != 'No')
                    {{ \Carbon\Carbon::parse($client->profile_service_date)->format('d-M-y') }}
                @else
                    
                @endif
            </td>
            <td>{{$client->ewchair ?? ""}}</td>
            <td>
                @if($client->ewchair != 'No') 
                    {{ \Carbon\Carbon::parse($client->wheelchair_service_date)->format('d-M-y') }} 
                @else 
                 
                @endif
            </td>
            <td>{{$client->sr_other ?? ""}}</td>
            <td>{{$client->sr_follow_up ?? ""}}</td>
            <td>{{$client->hygine ?? ""}}</td>
            <td>{{$client->hygine_detail ?? ""}}</td>
            <td>{{$client->cjournal ?? ""}}</td>
            <td>{{$client->cj_detail ?? ""}}</td>
            <td>{{$client->pref_sheet ?? ""}}</td>
            <td>{{$client->pref_sheet_detail ?? ""}}</td>
            <td>{{$client->refill ?? ""}}</td>
            <td>{{$client->refill_detail ?? ""}}</td>
            <td>{{$client->guidline ?? ""}}</td>
            <td>{{$client->guidline_detail ?? ""}}</td>
            <td>{{$client->time_in ?? ""}}</td>
            <td>{{$client->time_detail ?? ""}}</td>
            <td>{{$client->cg_content_log ?? ""}}</td>
            <td>{{$client->cg_content_log_detail ?? ""}}</td>
            <td>{{$client->cj_comment ?? ""}}</td>
            <td>{{$client->compatible ?? ""}}</td>
            <td>{{$client->compatible_detail ?? ""}}</td>
            <td>{{$client->dependable ?? ""}}</td>
            <td>{{$client->dependable_detail ?? ""}}</td>
            <td>{{$client->capable ?? ""}}</td>
            <td>{{$client->capable_detail ?? ""}}</td>
            <td>{{$client->recomm ?? ""}}</td>
            {{--<td>{{$client->dementia ?? ""}}</td>
            <td>{{$client->dementia_name ?? ""}}</td>
            <td>{{$client->pmh ?? ""}}</td>
            <td>{{$client->pm_name ?? ""}}</td>
            <td>{{$client->cater_care ?? ""}}</td>
            <td>{{$client->cater_carers_name ?? ''}}</td>
            <td>{{$client->per_care ?? ""}}</td>
            <td>{{$client->personel_care_name ?? ""}}</td>--}}
            <td>{{$client->meal_prep ?? ""}}</td>
            <td>{{$client->meal_preprations_name ?? ""}}</td>
            <td>{{$client->st_care ?? ""}}</td>
            <td>{{$client->stoma_care_name ?? ""}}</td>
            <td>{{$client->pp_update}}</td>
            <td>{{date('d-M-y',strtotime($client->pp_date))}}</td>
            <td>{{$client->train_other}}</td>
            <td>{{$client->train_note}}</td>

        </tr>
    @endforeach

    </tbody>
</table>
