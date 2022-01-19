@extends('layouts.admin')
@section('title', 'CAREManager')
@section('nav-title', 'CAREManager List')
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
    .margin_bottomm
    {
        margin-bottom: 100px !important;
    }
    .dataTables_scrollHead
    {
        margin-bottom: -70px;
    }
    .manager_text
    {
        text-transform:capitalize !important;
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
                    <h5 class="card-title">CAREManager List</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="toolbar text-right">
                                <a href="{{route('admin.caremanager.add')}}"  class="btn btn-success" >+ <span class="manager_text">Add</span> CARE<span class="manager_text">Manager</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="material-datatables mt-3">
                        <table class="datatables table table-striped table-bordered table-hover" cellspacing="0" width="100%" style="width:100%;margin-bottom: 70px !important;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Comment</th>
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
                                    <td>{{$item->comment}}</td>
                                    <td>
                                        @if(!empty($item->deleted_at))
                                        {{ 'Archived' }}
                                        @elseif($item->status == 'Active')
                                        {{ $item->status }}
                                        @elseif($item->status == "Suspend")
                                        {{ 'Suspended' }}
                                        @endif

                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a href="{{route('admin.caremanager.edit',['id'=>$item->id])}}"  rel="tooltip" class="dropdown-item"
                                                    data-original-title="Edit" title="Edit">
                                                    Edit
                                                </a>
                                                @if($item->deleted_at==null)
                                                <a href="javascript:void(0);" onclick="alertMessage('{{route('admin.caremanager.archive',$item->id)}}', 'Please Confirm', '', 'Archive', '#4CAF50')" class="dropdown-item" data-original-title="Archive" title="Archive" rel="tooltip" >Archive</a>
                                                @else
                                                <a href="javascript:void(0);" onclick="alertMessage('{{route('admin.caremanager.unarchive',$item->id)}}','Please Confirm','', 'Unarchive', '#3085d6')" class="dropdown-item" data-original-title="UnArchive" title="UnArchive" rel="tooltip" >UnArchive</a>
                                                @endif
                                                @if($item->status=='Active')
                                                <a href="javascript:void(0);" class="dropdown-item" onclick="alertMessage('{{route('admin.caremanager.suspend',$item->id)}}', 'Please Confirm', '', 'Suspend', '#3085d6')" data-original-title="Suspend" title="Suspend" rel="tooltip" >Suspend</a>
                                                @else
                                                <a href="javascript:void(0);" onclick="alertMessage('{{route('admin.caremanager.active',$item->id)}}', 'Please Confirm', '', 'Activate', '#4CAF50')" class=" dropdown-item" data-original-title="Active" title="Active" rel="tooltip" >Active</a>
                                                @endif
                                                <a href="javascript:void(0);" onclick="alertMessage('{{route('admin.caremanager.delete',$item->id)}}', 'User will be Deleted', '', 'Delete', '#3085d6')" rel="tooltip" class="dropdown-item" data-original-title="Delete" title="Delete">
                                                    Delete
                                                </a>
                                            </div>
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
