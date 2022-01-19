@extends('layouts.admin')
@section('title', 'CAREGiver List')
@section('nav-title', 'CAREGiver List')
@section('css')

@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-success card-header-icon">
                        <div class="card-icon"><i class="material-icons">list</i></div>
                        <h5 class="card-title">CAREGiver List</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                @if(auth()->user()->role == "admin" || auth()->user()->role == "ops_manager")
                                    <div class="toolbar text-right">
                                        <a href="{{route('caremanager.caregiver.add')}}"  class="btn btn-success" >+ Add CAREGIVER</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="material-datatables mt-3">
                            <table class="datatables table table-striped table-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>ID Number</th>
                                    @if(auth()->user()->role == "admin" || auth()->user()->role == "ops_manager")
                                        <th width="20%">Action</th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($list as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->id_number}}</td>
                                        @if(auth()->user()->role == "admin" || auth()->user()->role == "ops_manager")
                                            <td>
                                                <a href="{{route('caremanager.caregiver.edit',['id'=>$item->id])}}"  rel="tooltip" class="btn btn-success btn-round edit size"
                                                   data-original-title="Edit" title="Edit">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                                <button type="button" onclick="deleteAlert('{{ route('caremanager.caregiver.delete', $item->id) }}')" rel="tooltip" class="btn btn-danger btn-round delete-btn" data-original-title="Delete" title="Delete">
                                                    <i class="material-icons">close</i>
                                                </button>

                                            </td>
                                        @endif
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

