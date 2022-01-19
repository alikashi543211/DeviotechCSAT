@extends('layouts.admin')
@section('title', 'Client')
@section('nav-title', 'Client List')
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
                            <div class="">
                                <label for="type">Client Type</label>
                                <select name="type" id="type" class="form-control @error('type') is-invalid @enderror">
                                    <option value="" disabled >Select Type</option>
                                    <option value="all" selected {{ $request->name == 'all' ? 'selected' : ''}}>All</option>
                                    @foreach($types as $type)
                                    <option {{ $type->category == $request->type ? 'selected' : ''}} value="{{$type->category}}" >{{$type->category ?? ""}}</option>
                                    @endforeach
                                </select>
                                @error('type')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="">
                                <label for="type">Condition</label>
                                <select name="condition" id="condition" class="form-control @error('condition') is-invalid @enderror">
                                    <option value="" disabled >Select Conditions</option>
                                    <option value="all" selected {{ $request->condition == 'all' ? 'selected' : ''}}>All</option>
                                    @foreach($conditions as $cond)
                                    <option {{ $cond->diagnose == $request->condition ? 'selected' : ''}}  value="{{$cond->diagnose}}" >{{$cond->diagnose ?? ""}}</option>
                                    @endforeach
                                </select>
                                @error('condition')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="">
                                <label for="type">County</label>
                                <select name="county" id="county" class="form-control @error('county') is-invalid @enderror">
                                    <option value="" disabled >Select County</option>
                                    <option value="all" selected {{ $request->county == 'all' ? 'selected' : ''}}>All</option>
                                    @foreach($counties as $county)
                                    <option {{ $county->county == $request->county ? 'selected' : ''}} value="{{$county->county}}" >{{$county->county ?? ""}}</option>
                                    @endforeach
                                </select>
                                @error('county')
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
                                    <button type="submit" name="export" value="export" class="btn btn-info reset">Export</button>
                                    <button type="button" class="btn btn-danger reset">Reset</button>
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
                <h5 class="card-title">Client's List</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="toolbar text-right">
                            <a href="{{route('client.add')}}" class="btn btn-success" >+ Add Client</a>

                        </div>
                    </div>
                </div>
                <div class="material-datatables mt-3">
                    <table class=" table table-striped table-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Care Start Date</th>
                                <th>Client Name</th>
                                <th>DOB</th>
                                <th>Client Type</th>
                                <th>Condition</th>
                                <th>County</th>
                                <th>Locality</th>
                                <th>Eircode</th>
                                <th>CareManager</th>
                                <th width="8%">New QA Survey</th>
                                <th width="15%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clients as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>

                                <td>{{date('d/m/Y',strtotime($item->care_start_date))}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->dob?date('d/m/Y',strtotime($item->dob)):''}}</td>
                                <td>{{$item->type}}</td>
                                <td>{{$item->condition}}</td>
                                <td>{{$item->county}}</td>
                                <td>{{$item->locality}}</td>
                                <td>{{$item->eircode}}</td>
                                <td>{{$item->care_manager}}</td>
                                <td class="clr" width="8%">
                                    <div class="input-group justify-content-center">
                                        <input type="text" class="form-control form-control-sm link bg-white"  value="{{route('client.form.link')}}?client={{base64_encode($item->name)}}&care_m={{base64_encode($item->care_manager_id) }}&c={{ base64_encode($item->id)}}">
                                        <div class="input-group-append">
                                            <button class="btn btn-sm btn-primary copy-link">Copy</button>
                                        </div>
                                    </div>

                                </td>
                                <td>
                                    <a href="{{route('client.edit',$item->id)}}"  rel="tooltip" class="btn btn-size btn-success edit btn-round"
                                       data-original-title="Edit" title="Edit">
                                       <i class="material-icons">edit</i>
                                   </a>
                                   <button type="button" onclick="alertMessage('{{route('client.delete',$item->id)}}', 'Please Confirm', '', 'Delete', '#3085d6')" rel="tooltip" class="btn btn-size btn-danger btn-round delete-btn" data-original-title="Delete" title="Delete">
                                        <i class="material-icons">close</i>
                                    </button>
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
            "scrollY": true,
            "pagingType": "full_numbers",
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search records",
            }
        });

    });
</script>
<script>
    $(document).on("click",".copy-link", function(event) {
        var elm = $(this).closest('td').find('.link');
        $(elm).select();
        document.execCommand("copy");
        $('.copy-link').text('Copy');
        $(this).text('Copied');
    });
</script>


@endsection


