@extends('layouts.admin')
@section('title', 'Dashboard')
@section('nav-title', 'Dashboard')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="dropdown pull-right">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 @if(isset(request()->show) && request()->show == 'year')
                 Year to Date
                 @elseif(isset(request()->show) && request()->show == 'quarter')
                 This Quarter
                 @elseif(isset(request()->show) && request()->show == 'month')
                 This Month
                 @else
                 Filter
                 @endif
             </button>
             <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="{{ Request::url() }}?show=year">Year to Date</a>
                <a class="dropdown-item" href="{{ Request::url() }}?show=quarter">This Quarter</a>
                <a class="dropdown-item" href="{{ Request::url() }}?show=month">This Month</a>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
                <div class="card-icon"><i class="material-icons">groups</i></div>
                <p class="card-category">Visits</p>
                <h3 class="card-title">{{ $no_of_visits }}</h3>
            </div>
            <div class="card-footer">
                <div class="stats"><i class="material-icons">groups</i> Total # of visits</div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
                <div class="card-icon"><i class="material-icons">cached</i></div>
                <p class="card-category">NPS</p>
                <h3 class="card-title">{{ floor($nps) }}</h3>
            </div>
            <div class="card-footer">
                <div class="stats"><i class="material-icons">cached</i> NPS </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
                <div class="card-icon"><i class="material-icons">how_to_reg</i></div>
                <p class="card-category">CSAT</p>
                <h3 class="card-title">{{ nthDecimal($csat_avg, 2) }}</h3>
            </div>
            <div class="card-footer">
                <div class="stats"><i class="material-icons">how_to_reg</i> Avg # of csat</div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
