<!DOCTYPE html>
<html>

<head>
  <title>CSAT PDF</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    .logo {
      width: 190px;
      height: 90px;
      float: right;
    }

    input.change {
      width: 70%;
      margin: 3px;
      border-bottom: 1px solid
    }

    label {
      margin-left: 1px;
    }

    table.table,
    th.th,
    td.td,
      {
      border: 1px solid black;
      border-collapse: collapse;
    }

    th.th,
    td.td {
      padding: 4px;
    }

    th.th{
      justify-content: left !important;
      text-align: left;
    }

    td.td{
      justify-content: center !important;
      text-align: center;
    }

    label,
    th {
      color: #62194F;
    }

    caption.caption {
      border-collapse: collapse;
    }
  </style>
</head>

<body>
  <div style="width: 100%;margin:auto;padding: 6px">
    <table width="100%" style="width: 100%;">
      <tbody>
        <tr>
          <td width="62%">
            <h1 style="text-align: center; color: #62194F;">Quality Assurance, Home Visit</h1>
          </td>
          <td>
          {{-- <img src="https://forms.paperlessworkflows.ie/csat/assets/img/logo.png" class="logo" /> --}}
          {{--<img src="assets/img/logo.png" class="logo" />--}}
          <img src="{{ asset('images/logo.png') }}" class="logo" />
          </td>
        </tr>
      </tbody>
    </table>
    <div style="border: 1px solid; padding:15px;margin-top:15px">
      <table width="100%">
        <tbody>
          <tr style="margin-top: 6px;">
            <td width="25%">
              <label for="">Client:</label>
              <span style="border-bottom: 1px solid;">{{$clients->client_name ?? ''}}</span>
            </td>
            <td width="25%">
              <label for="">Date of visit:</label>
              <span style="border-bottom: 1px solid;">{{ date('d-M-y', strtotime($clients->qa_visit_date)) ?? 'N/A'}}</span>
            </td>
            <td width="25%">
              <label for="">C.Mgr: </label>
              <span style="border-bottom: 1px solid;">{{$clients->care_manager ?? ""}}</span>
            </td>
          </tr>
          <tr style="margin-top: 6px;">
            <td width="25%">
              <label for="" style="vertical-align: -webkit-baseline-middle; padding:10px 0px">Sign:</label>
              <span style="border-bottom: 1px solid;">
                <img src="https://forms.paperlessworkflows.ie/csat/public/{{$clients->client_signatue ?? ''}}" class="logo" alt="signature" style="height:20px" />
              </span>
            </td>
            <td width="25%">
              <label for="" style="vertical-align: -webkit-baseline-middle;">Client ID:</label>
              <span style="border-bottom: 1px solid;">{{ $clients->client_number ?? ''}}</span>
            </td>
            <td width="25%;">
              <label for="" style="vertical-align: -webkit-baseline-middle; padding:10px 0px">Sign:</label>
              <span style="border-bottom: 1px solid;">
                <img src="https://forms.paperlessworkflows.ie/csat/public/{{$clients->caremanager_signatue ?? ''}}" class="logo" alt="signature" style="height:20px" />
              </span>
            </td>
          </tr>
          <tr style="margin-top: 6px">
            <td width="35%">
              <label for="">Survey ID:</label>
              <span style="border-bottom: 1px solid;">AA</span>
            </td>
            <td width="20%">
              <label for="">Type:</label>
              <span style="border-bottom: 1px solid;">{{$clients->category ?? ''}}</span>
            </td>
            <td width="35%">
              <label for="">Condition:</label>
              <span style="border-bottom: 1px solid;">{{$clients->client_health_diagnose ?? ""}}</span>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <div style="margin-top: 15px;">
      <table class="table" style="width: 100%;">
        <tbody>
          <tr>
            <th class="" colspan="5" style="background-color:lightgray;">Performance & Quality Confirmation</th>
          </tr>
          <tr style="margin-top: 6px;">
            <th class="">CAREGiver</th>
            <th class="">Kind / Caring Score</th>
            <th class="">Competent Score</th>
            <th class="">Reliable Score</th>
            <th class="">Carer Average</th>
          </tr>
          @foreach($care_giver_name as $item)
          <tr style="margin-top: 6px;justify-content:center;text-align:center">
            <td class="td">{{$item->care_giver_name ?? ''}}</td>
            <td class="td">{{$item->attitude ?? ''}}</td>
            <td class="td">{{$item->ability ?? "N/A"}}</td>
            <td class="td">{{$item->reliability ?? ''}}</td>
            <td class="td">{{$item->attitude ?? ""}}</td>
          </tr>
          @endforeach
          <tr style="margin-top: 5px;">
            <th class="th">Combined Ave.</th>
            <td colspan="4" class="td">
              {{$care_giver_name->avg('average_giver') ?? '0'}}
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div style="margin-top: 15px;">
      <table class="table" style="width:100%;">
        <tbody>
          <tr>
            <th class="" colspan="2" style="background-color:lightgray;">CAREManager</th>
            <th class="" colspan="2" style="background-color:lightgray;">Back Office</th>
          </tr>
          <tr style="margin-top: 6px;">
            <th class="th">Helpful Score</th>
            <td class="td">{{$clients->Cm_attitud ?? ''}}</td>
            <th class="th">Helpful Score</th>
            <td class="td">{{$clients->Off_help ?? ''}}</td>
          </tr>
          <tr style="margin-top: 6px;">
            <th class="th">Identify Needs Score</th>
            <td class="td">{{$clients->Cm_reliability ?? ''}}</td>
            <th class="th">Promptness Score</th>
            <td class="td">{{$clients->Off_service ?? ''}}</td>
          </tr>
          <tr style="margin-top: 6px;">
            <th class="th">High Standards Score</th>
            <td class="td">{{$clients->Cm_ability ?? ''}}</td>
            <th class="th">Competent Score</th>
            <td class="td">{{$clients->Off_communication ?? ""}}</td>
          </tr>
          <tr style="margin-top: 6px;">
            <th class="th">Average</th>
            <td class="td">{{$clients->Cm_average ?? ''}}</td>
            <th class="th">Average</th>
            <td class="td">{{$clients->Off_average ?? ''}}</td>
          </tr>
          <tr style="margin-top: 6px;">
            <td colspan="2" class="td" style="text-align: left;">Comments:{{$clients->Cm_comment ?? ''}}</td>
            <td colspan="2" class="td" style="text-align: left;">Comments:{{$clients->Off_comment ?? ''}}</td>
          </tr>
          <tr style="margin-top: 6px;">
            <th class="th" colspan="2">Overall Combined & Weighted CSAT Score:</th>
            <td colspan="2" class="td" style="font-size:12;font-weight:bold">{{$clients->csat ?? ''}}</td>
          </tr>
        </tbody>
      </table>
    </div>

    <div style="margin-top: 15px;">
      <table class="table" style="width: 100%;">
        <tbody>
          <tr>
            <th class="" colspan="13" style="background-color:lightgray;">Service Advocacy</th>
          </tr>
          <tr style="margin-top: 6px;">
            <th class="th" colspan="1">Who</th>
            <td class="td" colspan="2">{{$clients->who ?? ''}}</td>
            <th class="th" colspan="2">Expectation</th>
            <td class="td" colspan="8">{{$clients->expectations ?? ''}}</td>
          </tr>
          <tr style="margin-top: 6px;">
            <th class="th" colspan="3">Overall Value of Service:</th>
            <td class="td" colspan="10" style="text-align: left;">{{$clients->adv_disc ?? ''}}</td>
          </tr>
          <tr style="margin-top: 6px;">
            <th class="th" colspan="8">How likely are you to recommend HISC to a friend on a scale 0 to 10?</th>
            <td class="td" colspan="5" style="font-size: 12;font-weight:bold">{{$clients->adv_rec ?? ""}}</td>
          </tr>
          <tr style="margin-top: 6px;">
            <th class="th" colspan="3">NPS Comments</th>
            <td colspan="10" class="td" style="text-align: left;">{{$clients->adv_comment ?? ''}}</td>
          </tr>
        </tbody>
      </table>
    </div>

    <div style="margin-top:25px; page-break-before: always;">
      <table class="table" style="width: 100%;">
        <tbody>
          <tr>
            <th class="" colspan="4" style="background-color:lightgray;">Client Profile</th>
          </tr>
          <tr style="margin-top: 6px;">
            <th class="th">Quality of Life</th>
            <td class="td">{{$clients->quality_of_Life ?? ""}}</td>
            <th class="th">Client Name</th>
            <td class="td">{{$clients->client_name ?? ''}}</td>
          </tr>
          <tr style="margin-top: 6px;">
            <th class="th">Details of Client Profile Changes:</th>
            <td class="td" colspan="3" style="text-align:left;">{{$clients->cp_details ?? ""}}</td>
          </tr>
        </tbody>
      </table>
    </div>

    <div style="margin-top: 15px;">
      <table class="table" style="width: 100%;">
        <tbody>
          <tr>
            <th class="" colspan="4" style="background-color:lightgray;">Solving a ‘Need’/ Any Additional Hours or Services?</th>
          </tr>
          <tr style="margin-top: 6px;">
            <th class="th" style="width:40%;">Are there any ‘unmet needs’ ? Expand</th>
            <td class="td" colspan="3" style="width:60%;text-align:left;" style="text-align:left;">{{$clients->expand_on_unmet_needs ?? ''}}</td>
          </tr>
          <tr style="margin-top: 6px;">
            <th class="th" style="width:40%;">Review Care Plan. Actions?</th>
            <td class="td" colspan="3" style="width:60%;text-align:left;" style="text-align:left;">{{$clients->review_care_plan ?? ""}}</td>
          </tr>
          {{--<tr style="margin-top: 6px;">
            <th class="th">Additional Car Hours?</th>
            <td class="td"></td>
            <th class="th">No. of Additional Hours?</th>
            <td class="td"></td>
          </tr>--}}
          <tr style="margin-top: 6px;">
            <th class="th" style="width:40%;">Other Services Required?</th>
            <td colspan="3" class="td" style="width:60%;text-align:left;">
                @if(isset($clients->add_other_yes))
                    @if($clients->add_other_yes != 'No')
                        {{ $clients->add_other }}
                    @else
                        No
                    @endif
                @else
                    
                @endif
            </td>
          </tr>
          <tr style="margin-top: 6px;">
            <th class="th" style="width:40%;">Capture Next Steps</th>
            <td colspan="3" class="td" style="width:60%;text-align:left;">{{$clients->agree_update_next_schedule ?? ''}}</td>
          </tr>
        </tbody>
      </table>
    </div>
    <div style="margin-top: 15px;">
      <table class="table" style="width: 100%;">
        <tbody>
          <tr>
            <th class="" colspan="4" style="background-color:lightgray;">Service Review</th>
          </tr>
          <tr style="margin-top: 6px;">
            <th class="th">Deal with Meds?</th>
            <td class="td">{{$clients->cg_meals ?? ""}}</td>
            <th class="th">Medi Set Type</th>
            <td class="td">{{$clients->medi_set_type ?? ''}}</td>
          </tr>
          <tr style="margin-top: 6px;">
            <th class="th">Have Home Keys?</th>
            <td class="td">{{$clients->cg_hm_key ?? ''}}</td>
            <th class="th">Key Form Signed?</th>
            <td class="td">{{$clients->cg_hm_key_sign ?? ''}}</td>
          </tr>
          <tr style="margin-top: 6px;">
            <th class="th">Client Key Safe?</th>
            <td class="td">{{$clients->cg_key_info_safe ?? ''}}</td>
            <th class="th">Safe Info Provided?</th>
            <td class="td">{{$clients->cg_key_info ?? ''}}</td>
          </tr>
          <tr style="margin-top: 6px;">
            <th class="" style="background-color: lightgray;">Equipment</th>
            <th class="" style="background-color: lightgray;">Service Date</th>
            <th class="" style="background-color: lightgray;">Equipment</th>
            <th class="" style="background-color: lightgray;">Service Date</th>
          </tr>
          <tr style="margin-top: 6px;">
            <td class="td">Bath Hoist? - {{ ucfirst($clients->bath_hoist) ?? ''}}</td>
            <td class="td">
              @if($clients->bath_hoist != 'No') 
                {{ \Carbon\Carbon::parse($clients->bt_hoist_service_date)->format('d-M-y') }} 
              @else 
                 
              @endif
            </td>
            <td class="td">Stairlift? - {{ ucfirst($clients->starlift) ?? ''}}</td>
            <td class="td">
              @if($clients->starlift != 'No')
                {{ \Carbon\Carbon::parse($clients->starlift_service_date)->format('d-M-y') }}
              @else
                
              @endif
            </td>
          </tr>
            <tr style="margin-top: 6px;">
                <td class="td">Hoist ? - {{ ucfirst($clients->hoist) ?? ""}}</td>
                <td class="td"> 
                    @if($clients->hoist != 'No')
                        {{ date("d-M-y", strtotime($clients->hoist_service_date)) }}
                    @else
                    
                    @endif
                </td>
                <td class="td">Profile Bed - {{ ucfirst($clients->profile_bed) ?? ''}}</td>
                <td class="td">
                    @if($clients->profile_bed != 'No')
                        {{ \Carbon\Carbon::parse($clients->profile_service_date)->format('d-M-y') }}
                    @else
                    
                    @endif
                </td>
            </tr>
            <tr style="margin-top: 6px;">
                <td class="td">E wheelchair - {{ ucfirst($clients->ewchair) ?? ''}}</td>
                <td class="td">
                    @if($clients->ewchair != 'No') 
                        {{ \Carbon\Carbon::parse($clients->wheelchair_service_date)->format('d-M-y') }} 
                    @else 
                     
                    @endif
                </td>
                <td class="td"></td>
                <td class="td"></td>
            </tr>
            <tr style="margin-top: 6px;">
                <td class="td">Actions?</td>
                <td class="td" colspan="3">{{$clients->sr_follow_up ?? ''}}</td>
            </tr>
        </tbody>
      </table>
    </div>

    <div style="margin-top: 15px;">
      <table class="table" style="width: 100%;">
        <tbody>
          <tr>
            <th class="" colspan="4" style="background-color:lightgray;">Client Journal & House Inspection</th>
          </tr>
          <tr style="margin-top: 6px;">
            <th class="th">Client Journal accessible</th>
            <td class="td">{{$clients->cjournal ?? ''}}</td>
            <th class="th">Preference Sheets done</th>
            <td class="td">{{$clients->pref_sheet ?? ""}}</td>
          </tr>
          <tr style="margin-top: 6px;">
            <th class="th">Logs / binder refill</th>
            <td class="td">{{$clients->refill ?? ''}}</td>
            <th class="th">Journal Med. Guidelines</th>
            <td class="td">{{$clients->guidline ?? ''}}</td>
          </tr>
          <tr style="margin-top: 6px;">
            <th class="th">Content Log OK</th>
            <td class="td">{{$clients->cg_content_log ?? ''}}</td>
            <th class="th">Home Save & Hygienic</th>
            <td class="td">{{$clients->hygine ?? ''}}</td>
          </tr>
          <tr style="margin-top: 6px;">
            <th class="th">Times Recorded OK</th>
            <td class="td">{{$clients->time_in ?? ''}}</td>
            {{-- <th class="th">Other</th>
            <td class="td">{{$clients->time_in_detail ?? ''}}</td>
            --}}
            <th class="th"></th>
            <td class="td"></td>
          </tr>
          <tr style="margin-top: 6px;">
            <td class="td" colspan="4" style="text-align:left;">Comments / Reasons / Actions : {{$clients->cj_comment ?? ''}}</td>
          </tr>
        </tbody>
      </table>
    </div>

    <div style="margin-top: 15px;">
      <table class="table" style="width: 100%;">
        <tbody>
          <tr>
            <th class="" colspan="4" style="background-color:lightgray;">For Office Use</th>
          </tr>
          <tr style="margin-top: 6px;">
            <th class="th" width="40%">Compatible with Client?</th>
            <td class="td" width="10%">{{$clients->compatible ?? ''}}</td>
            <th class="th" width="20%">Compatible comment</th>
            <td class="td" width="30%">{{ $clients->compatible_detail ?? '' }}</td>
          </tr>
          <tr style="margin-top: 6px;">
            <th class="th" width="40%">Reliable and dependable</th>
            <td class="td" width="10%">{{ $clients->dependable ?? ''}}</td>
            <th class="th" width="20%">Reliable comment</th>
            <td class="td" width="30%">{{ $clients->dependable_detail ?? '' }}</td>
          </tr>
          <tr style="margin-top: 6px;">
            <th class="th" width="40%">Capable of providing reqd care</th>
            <td class="td" width="10%">{{ $clients->capable ?? ''}}</td>
            <th class="th" width="20%">Capable comment</th>
            <td class="td" width="30%">{{ $clients->capable_detail ?? '' }}</td>
          </tr>
          <tr style="margin-top: 6px;">
            <th class="th" width="40%">Recommendable for more hrs comment</th>
            <td class="td" width="60%" colspan="3" style="border-right-width:0px;">{{ $clients->recomm ?? ''}}</td>
          </tr>
        </tbody>
      </table>
  </div>
  <div style="margin-top:25px; page-break-before: always;">
      <table class="table" width="100%">
        <tbody>
          <tr>
            <th class="" style="background-color:lightgray;" width="100%" colspan="2">Training Needs</th>
          </tr>
          <tr style="margin-top: 6px;">
            <th class="th" width="30%">Dementia</th>
            <td class="td" width="70%">{{$clients->dementia_name ?? ''}}</td>
          </tr>
          <tr style="margin-top: 6px;">
            <th class="th" width="30%">PM & H</th>
            <td class="td" width="70%">{{$clients->pm_name ?? ''}}</td>
          </tr>
          <tr style="margin-top: 6px;">
            <th class="th" width="30%">CATHETER CARE</th>
            <td class="td" width="70%">{{$clients->cater_carers_name ?? ''}}</td>
          </tr>
          <tr style="margin-top: 6px;">
            <th class="th" width="30%">Personal Care</th>
            <td class="td" width="70%">{{$clients->personal_care_name ?? ''}}</td>
          </tr>
          <tr style="margin-top: 6px;">
            <th class="th" width="30%">MEAL PREPARATIONS</th>
            <td class="td" width="70%">{{$clients->meal_preprations_name ?? ''}}</td>
          </tr>
          <tr style="margin-top: 6px;">
            <th class="th" width="30%">Stoma Care</th>
            <td class="td" width="70%">{{$clients->stoma_care_name ?? ''}}</td>
          </tr>
          <tr style="margin-top: 6px;">
            <td class="td" colspan="2" width="100%" style="text-align: left;">Notes: {{$clients->train_note ?? ''}}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</body>

</html>