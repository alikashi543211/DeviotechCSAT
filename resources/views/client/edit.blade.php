@extends('layouts.admin')
@section('title', 'Client')
@section('nav-title', 'Client Edit')
@section('content')


    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form class="validate-form" action="{{ route('client.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card ">
                        <div class="card-header card-header-primary card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">update</i>
                            </div>
                            <h5 class="card-title">Update Client</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <input type="hidden" name="id" value="{{$data->id}}">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name">Care Start Date</label>
                                        <input type="date" value="{{ $data->care_start_date }}" name="care_start_date"  id="care_start_date" class="form-control datepick @error('care_start_date') is-invalid @enderror" required placeholder="Care Start Date">
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
                                        <input type="text" name="name" required placeholder="Name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $data->name }}" autocomplete="off">
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
                                        <input type="text" name="id_number" placeholder="Unique ID Number" required id="id_number" class="form-control @error('id_number') is-invalid @enderror" value="{{  $data->id_number }}" autocomplete="off">
                                        @error('id_number')
                                        <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name">Client DOB</label>
                                        <input type="date" name="dob"  id="dob" max="{{ date('Y-m-d') }}" class="form-control @error('dob') is-invalid @enderror" required placeholder="Date of Birth" value="{{ $data->dob }}" autocomplete="off">
                                        @error('dob')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="">
                                        <label for="type">Client Type</label>
                                        <select name="type" id="type" class="form-control @error('type') is-invalid @enderror" required>
                                            <option value="" disabled selected>Select</option>
                                            @foreach($types as $type)
                                                <option {{ $data->type==$type->category?'selected':''}} value="{{$type->category}}" >{{$type->category}}</option>
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
                                        <select name="condition" id="condition" class="form-control @error('condition') is-invalid @enderror" required>
                                            <option value="" disabled selected>Select</option>
                                            @foreach($conditions as $diagnose)
                                                <option {{ $data->condition==$diagnose->diagnose?'selected':''}} value="{{$diagnose->diagnose}}" >{{$diagnose->diagnose}}</option>
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
                                        <select name="county" id="county" class="form-control @error('county') is-invalid @enderror" required>
                                            <option value="" disabled selected>Select</option>
                                            @foreach($counties as $county)
                                                <option {{$data->county==$county->county?'selected':''}} value="{{$county->id}}" >{{$county->county}}</option>
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
                                    <div class="form-group">
                                        <label for="province">Province</label>
                                        <input type="text" name="province"  id="province" max="{{ date('Y-m-d') }}" class="form-control @error('province_id') is-invalid @enderror" required placeholder="Province" value="{{ $data->province }}" autocomplete="off" readonly>
                                        @error('province_id')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="">
                                        <label for="locality">Locality</label>
                                        <select name="locality" id="locality" class="form-control @error('locality') is-invalid @enderror" required>
                                            @foreach($localities as $local)
                                                <option {{$data->locality==$local->locality?'selected':''}} value="{{$local->locality}}" >{{$local->locality}}</option>
                                            @endforeach
                                        </select>
                                        @error('locality')
                                        <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="">
                                        <label for="type">Eircode</label>
                                        <input type="text" name="eircode" id="eircode" required placeholder="Eircode" value="{{$data->eircode}}" class="form-control @error('eircode') is-invalid @enderror">
                                        @error('eircode')
                                        <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                @if(auth()->user()->role=='admin')
                                    <div class="col-md-4">
                                        <div class="">
                                            <label for="type">CareManager</label>
                                            <select name="care_manager_id"  class="form-control @error('care_manager_id') is-invalid @enderror" required>
                                                <option value="" disabled selected>Select</option>
                                                @foreach($users as $user)
                                                    <option {{$data->care_manager_id==$user->id?'selected':''}} value="{{$user->id}}">{{$user->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                @else
                                    <input type="hidden" name="care_manager_id" id="care_manager" value="{{auth()->user()->id}}">
                                @endif
                            </div>
                        </div>
                        <div class="card-footer mt-4">
                            <div class="btn-group">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{url()->previous()}}"  class="btn btn-default">Back</a>
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

