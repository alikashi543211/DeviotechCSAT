@extends('layouts.admin')
@section('title', 'Client Survey')
@section('nav-title', 'Survey List')
@section('css')
<style>
    .copy-link{
        border-radius: 5px!important;
    }
</style>
@endsection
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon"><i class="material-icons">filter</i></div>
                    <h5 class="card-title">Filters</h5>
                </div>
                <div class="card-body">
                    <form action="" class="form-horizontal form-bordered portlet-body panel-body" method="GET">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">From</label>
                                    <input type="text" name="from"  id="from" value="{{$request->from ?? ''}}" class="form-control datepick @error('from') is-invalid @enderror" placeholder="Start Date" autocomplete="off" readonly>
                                    @error('from')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">To</label>
                                    <input type="text" name="to"  id="to" value="{{$request->to ?? ''}}" class="form-control datepick @error('to') is-invalid @enderror" placeholder="End Date" autocomplete="off" readonly>
                                    @error('to')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mt-2">
                                    <label for="type">NPS</label>
                                    <select name="nps" id="nps" class="form-control @error('nps') is-invalid @enderror select2">
                                        <option value="" disabled selected>Select NPS</option>
                                        <option {{ $request->nps == 'all' ? 'selected' : ''}} value="all" >All</option>
                                        <option {{ $request->nps == 'Detractor' ? 'selected' : ''}} value="Detractor" >Detractor</option>
                                        <option {{ $request->nps ==  'Passive' ? 'selected' : ''}} value="Passive" >Passive</option>
                                        <option {{ $request->nps == 'Promoter' ? 'selected' : ''}} value="Promoter" >Promoter</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="type">Client Type</label>
                                <select name="type" id="type" class="form-control @error('type') is-invalid @enderror select2">
                                    <option value="" disabled selected>Select Client Type</option>
                                    <option value="all" {{ $request->type == 'all' ? 'selected' : ''}}>All</option>
                                    @foreach($types as $type)
                                    <option {{ $type->category == $request->type ? 'selected' : ''}} value="{{$type->category}}" >{{$type->category ?? ""}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <div class="">
                                    <label for="type">Condition</label>
                                    <select name="condition" id="condition" class="form-control @error('condition') is-invalid @enderror select2">
                                        <option value="" disabled selected>Select Condition</option>
                                        <option value="all" {{ $request->condition == 'all' ? 'selected' : ''}}>All</option>
                                        @foreach($conditions as $condition)
                                        <option {{ $condition->diagnose == $request->condition ? 'selected' : ''}} value="{{$condition->diagnose}}" >{{$condition->diagnose ?? ""}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="">
                                    <label for="type">County</label>
                                    <select name="county" id="county" class="form-control @error('county') is-invalid @enderror select2">
                                        <option value="" disabled selected>Select County</option>
                                        <option value="all" {{ $request->county == 'all' ? 'selected' : ''}}>All</option>
                                        @foreach($counties as $county)
                                        <option {{ $county->county == $request->county ? 'selected' : ''}}  value="{{$county->county}}" >{{$county->county ?? ""}}</option>
                                        @endforeach
                                    </select>
                                    @error('country')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mt-2">
                                    <label for="type">Client Name</label>
                                    <select name="client" id="client" class="form-control @error('client') is-invalid @enderror select2">
                                        <option value="" disabled selected>Select Client</option>
                                        <option value="all" {{ $request->client == 'all' ? 'selected' : ''}}>All</option>
                                        @foreach($client_list as $item)
                                        <option {{ $item->name == $request->client ? 'selected' : ''}}  value="{{$item->name}}" >{{$item->name ?? ""}}</option>
                                        @endforeach
                                    </select>
                                    @error('client_id')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Client ID</label>
                                    <input type="text" name="client_id"  id="to" value="{{$request->client_id ?? ''}}" class="form-control @error('client_id') is-invalid @enderror" placeholder="Client ID" autocomplete="off">
                                    @error('client_id')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="toolbar text-right">
                                    <div class="btn-group">
                                        <button type="submit" class="btn btn-success">Filter</button>
                                        <button type="button" class="btn btn-danger reset">Reset</button>
                                        <button type="submit" name="export" value="export" class="btn btn-info">Excel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon"><i class="material-icons">list</i></div>
                    <h5 class="card-title">Survey's List</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">

                        </div>
                    </div>
                    <div class="material-datatables mt-3">
                        <table class=" table table-striped table-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Visit Date</th>
                                    <th>Care Start Date</th>
                                    <th>Client Name</th>
                                    <th>Client ID</th>
                                    <th>Date Of Birth</th>
                                    <th>County</th>
                                    <th>Locality</th>
                                    <th>Client Type</th>
                                    <th>Condition</th>
                                    <th>Survey #</th>
                                    <th>CareManager</th>
                                    <th>NPS</th>
                                    <th>CSAT</th>
                                    <th width="20%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($clients as $client)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{date('d-m-Y',strtotime($client->qa_visit_date))}}</td>
                                    <td>{{date('d-m-Y',strtotime($client->care_start_date))}}</td>
                                    <td>{{$client->client_name}}</td>
                                    <td>{{$client->client_number}}</td>
                                    <td>{{date('d-m-Y',strtotime($client->client_dob))}}</td>
                                    <td>{{$client->county}}</td>
                                    <td>{{$client->locality}}</td>
                                    <td>{{$client->category}}</td>
                                    <td>{{$client->client_health_diagnose}}</td>
                                    <td>QA 10{{$client->id}}</td>
                                    <td>{{$client->care_manager}}</td>
                                    <td>{{ $client->nps }}</td>
                                    <td>{{$client->csat}}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{route('survey.pdf',$client->id)}}" class="btn btn-info">PDF</a>
                                            <a href="{{ route('caremanager.single.excel',$client->id) }}" class="btn btn-light">Excel</a>
                                            @if($client->form_status == '1')
                                                <a href="{{route('client.form.link')}}?status={{$client->id}}&c={{ base64_encode($client->client_id) ?? ''}}&care_m={{ base64_encode($client->care_manager_id) }}&edit_by=caremanager" class="btn btn-primary">Draft</a>
                                            @endif
                                            <button type="button" onclick="deleteAlert('{{ route('caremanager.survey.delete', $client->id) }}')" rel="tooltip" class="btn btn-danger btn-round delete-btn" data-original-title="Delete" title="Delete">
                                                <i class="material-icons">close</i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('js')


<script>
    $(document).ready(function () {

        var table = $('.table').DataTable({
            "sort": false,
            "ordering": false,
            "scrollX": true,
            "pagingType": "full_numbers",
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search records",
            }
        });
    });
</script>

@endsection
