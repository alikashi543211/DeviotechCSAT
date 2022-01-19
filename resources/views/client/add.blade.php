@extends('layouts.admin')
@section('title', 'Client')
@section('nav-title', 'Client Add')
@section('content')


<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <form class="validate-form" action="{{ route('client.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card ">
                    <div class="card-header card-header-primary card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">add</i>
                        </div>
                        <h5 class="card-title">Add Client</h5>
                    </div>
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Care Start Date</label>
                                    <input type="date" name="care_start_date" id="care_start_date" class="form-control @error('care_start_date') is-invalid @enderror" placeholder="Care Start Date" autocomplete="off">
                                    @error('care_start_date')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Client Name</label>
                                    <input type="text" name="name" placeholder="Name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" autocomplete="off">
                                    @error('name')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">ID Number</label>
                                    <input type="text" name="id_number" placeholder="Unique ID Number" id="id_number" class="form-control @error('id_number') is-invalid @enderror" value="{{ old('id_number') }}" autocomplete="off">
                                    @error('id_number')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mt-4">
                                    <label for="name">Client DOB</label>
                                    <input type="date" name="dob" id="dob" max="{{ date('Y-m-d') }}" class="form-control @error('dob') is-invalid @enderror" placeholder="Date of Birth" autocomplete="off">
                                    @error('dob')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mt-4">
                                    <label for="type">Client Type</label>
                                    <select name="type" id="type" class="form-control @error('type') is-invalid @enderror">
                                        <option value="" disabled selected>Select</option>
                                        @foreach($types as $type)
                                        <option value="{{$type->category}}">{{$type->category}}</option>
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
                                <div class="mt-4">
                                    <label for="type">Condition</label>
                                    <select name="condition" id="condition" class="form-control @error('condition') is-invalid @enderror">
                                        <option value="" disabled selected>Select</option>
                                        @foreach($conditions as $diagnose)
                                        <option value="{{$diagnose->diagnose}}">{{$diagnose->diagnose}}</option>
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
                                <div class="mt-4">
                                    <label for="type">County</label>
                                    <select name="county" id="county" class="form-control @error('county') is-invalid @enderror">
                                        <option value="" disabled selected>Select</option>
                                        @foreach($counties as $county)
                                        <option value="{{$county->id}}">{{$county->county}}</option>
                                        @endforeach
                                    </select>
                                    @error('county')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mt-4">
                                    <label for="name">Province</label>
                                    <input type="text" name="province" id="province" class="form-control @error('province_id') is-invalid @enderror" placeholder="Province" autocomplete="off" readonly>
                                    @error('province_id')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mt-4">
                                    <label for="locality">Locality</label>
                                    <input type="text" class="form-control @error('locality') is-invalid @enderror" name="locality">
                                    {{--<select name="locality" id="locality" class="form-control @error('locality') is-invalid @enderror" >
                                        <option value="" disabled selected>Select</option>
                                    </select>--}}
                                    @error('locality')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mt-4">
                                    <label for="type">Eircode</label>
                                    <input type="text" name="eircode" id="eircode" placeholder="Eircode" value="{{old('eircode')}}" class="form-control @error('eircode') is-invalid @enderror">
                                    @error('eircode')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            @if(auth()->user()->role=='admin')
                            <div class="col-md-4">
                                <div class="mt-4">
                                    <label for="type">CareManager</label>
                                    <select name="care_manager_id" class="form-control @error('care_manager_id') is-invalid @enderror">
                                        <option value="" disabled selected>Select</option>
                                        @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('care_manager_id')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            @else
                            <input type="hidden" name="care_manager_id" id="care_manager" value="{{auth()->user()->id}}">
                            @endif
                        </div>
                    </div>
                    <div class="card-footer mt-4">
                        <div class="btn-group">
                            <button type="submit" class="btn btn-primary">submit</button>
                            <a href="{{url()->previous()}}" class="btn btn-default">Back</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
@section('js')

<script>
    $('#county').on('change', function() {

        let id = $(this).val();
        let url = '{{ route("find.locality") }}/' + id;
        let url_province = '{{ route("find.province") }}/' + id;
        $.get(url, function(data) {
            console.log(data);
            $('#locality').html(data);
        });
        console.log(url_province);
        $.get(url_province, function(response) {
            console.log(response);
            $('#province').val(response);
        });

    });
</script>

@endsection