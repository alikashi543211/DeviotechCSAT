@extends('layouts.admin')
@section('title', 'Admin')
@section('nav-title', 'Admin List')
@section('css')
<style>
    .size{
        color: black!important;
        font-weight: 700;
        font-size: 12px!important;
        padding: 8px 11px!important;
        border-radius: 5px!important;
    }
    .edit{
        background-color: #FFFF00!important;

    }
    .suspend{
        background-color: #4caf50!important;
    }
    .trash{
        background-color: #00a5bb!important;
    }
    .del{
        background-color: red!important;
    }
</style>

@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon"><i class="material-icons">list</i></div>
                    <h5 class="card-title">Admin List</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="toolbar text-right">
                                <a href="{{route('admin.ops_manager.add')}}"  class="btn btn-success" >+ Add Admin</a>
                            </div>
                        </div>
                    </div>
                    <div class="material-datatables mt-3">
                        <table class="datatables table table-striped table-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th width="20%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($managers as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->status}}</td>
                                    <td>
                                        <a href="{{route('admin.ops_manager.edit',['id'=>$item->id])}}"  rel="tooltip" class="btn  edit size"
                                         data-original-title="Edit" title="Edit">
                                         Edit
                                     </a>
                                     <button type="button" onclick="deleteAlert('{{ route('admin.ops_manager.delete', $item->id) }}')" rel="tooltip" class="btn size del  delete-btn" data-original-title="Delete" title="Delete">
                                        Delete
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
