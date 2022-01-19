@extends('layouts.admin')
@section('title', 'Locality')
@section('nav-title', 'Locality List')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-success card-header-icon">
                        <div class="card-icon"><i class="material-icons">list</i></div>
                        <h5 class="card-title">Locality List</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="toolbar text-right">
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal">+ Add Locality</button>
                                </div>
                            </div>
                        </div>
                        <div class="material-datatables mt-3">
                            <table class="datatables table table-striped table-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>County</th>
                                    <th>Status</th>
                                    <th width="20%">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($list as $item)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>

                                        <td>{{$item->locality}}</td>
                                        <td>{{$item->county->county}}</td>
                                        <td>{{$item->status==true?'Active':'Disable'}}</td>
                                        <td>
                                            <a href="#"  rel="tooltip" class="btn btn-success edit btn-round"
                                               data-id="{{$item->id}}"
                                               data-name="{{$item->locality}}"
                                               data-county="{{$item->county->id}}"
                                               data-status="{{$item->status}}"

                                               data-original-title="Edit" title="Edit">
                                                <i class="material-icons">edit</i>
                                            </a>
                                            <button type="button" onclick="deleteAlert('{{ route('admin.services.locality.delete', $item->id) }}')" rel="tooltip" class="btn btn-danger btn-round delete-btn" data-original-title="Delete" title="Delete">
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




    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog mt-0 modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header pt-3 pb-2 border-bottom">
                    <h4 class="modal-title " style="font-weight: 700" id="exampleModalLabel">Add Locality</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" class="mb-0" action="{{route('admin.services.locality.save')}}">
                    @csrf
                    <div class="modal-body">
                        <div class="row mb-3">
                            <div class="col-md-3 offset-md-1">
                                <div class="form-group">County</div>
                            </div>

                            <div class="col-md-7">
                                <select name="county_id" class="form-control" required>
                                    <option value="" selected disabled>Select</option>
                                    @foreach($counties as $county)
                                        <option value="{{$county->id}}">{{$county->county}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 offset-md-1">
                                <div class="form-group">Locality</div>
                            </div>
                            <div class="col-md-7"><input type="text" class="form-control @error('locality') is-invalid @enderror" value="{{ old('locality') }}" autocomplete="off" name="locality" placeholder="Locality" required></div>
                        </div>
                    </div>
                    <div class="modal-footer mb-0 btn-group">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Add</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog mt-0 modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header pt-3 pb-2 border-bottom">
                    <h4 class="modal-title " style="font-weight: 700" id="exampleModalLabel">Update Locality</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" class="mb-0" action="{{route('admin.services.locality.update')}}">
                    @csrf
                    <input type="hidden" name="id" id="id">
                    <div class="modal-body">
                        <div class="row mb-3" >
                            <div class="col-md-3 offset-md-1">
                                <div class="form-group">County</div>
                            </div>
                            <div class="col-md-7">
                                <select id="county_id" name="county_id" class="form-control" >
                                    <option value="" disabled selected>Select</option>
                                    @foreach($counties as $county)
                                    <option value="{{$county->id}}">{{$county->county}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3" >
                            <div class="col-md-3 offset-md-1">
                                <div class="form-group">Locality</div>
                            </div>
                            <div class="col-md-7">
                                <input type="text" name="locality" class="form-control" required placeholder="Locality" id="locality">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3 offset-md-1">
                                <div class="form-group">Status</div>
                            </div>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <select id="status" name="status" class="form-control">
                                        <option value="0">Disable</option>
                                        <option value="1">Active</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer mb-0 btn-group">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection

@section('js')

    <script>
        $(document).ready(function () {

            $(document).on('click','.edit',function () {
                $('#id').val('');
                $('#locality').val('');
                $('#county_id').val('');
                $('#status').val('');
                let id=$(this).data('id');
                let name=$(this).data('name');
                let county=$(this).data('county');
                let status=$(this).data('status');
                console.log(name,id,status);
                $('#updateModal').modal('show');
                $('#id').val(id);
                $('#locality').val(name);
                $('#county_id').val(county);
                $('#status').val(status);
                // $('#status>option:eq(status)').attr('selected', true);


            });

        });
    </script>

@endsection

