@extends('layouts.admin')
@section('title', 'CMS')
@section('nav-title', 'CMS')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.setting.save') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card ">
                    <div class="card-header card-header-primary card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">add</i>
                        </div>
                        <h5 class="card-title">Logos</h5>
                    </div>
                    <div class="card-body ">
                    	<div class="row">
                    		<div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    			<div class="form-group">
                    				<label for="favicon">Favicon</label>
                    				<input type="file" name="favicon" id="favicon" class="dropify" data-default-file="{{ asset($setting['favicon'] ?? '' )  }}" accept=".png, .jpg, .jpeg, .gif, .svg">
                    			</div>
                    		</div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    			<div class="form-group">
                    				<label for="logo_light">Logo</label>
                    				<input type="file" name="logo" id="logo_light" class="dropify" data-default-file="{{ asset($setting['logo'] ?? '') }}" accept=".png, .jpg, .jpeg, .gif, .svg">
                    			</div>
                    		</div>
{{--                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">--}}
{{--                    			<div class="form-group">--}}
{{--                    				<label for="logo_dark">Logo Dark</label>--}}
{{--                    				<input type="file" name="logo_dark" id="logo_dark" class="dropify" data-default-file="{{ asset($setting['logo_dark']??'') }}" accept=".png, .jpg, .jpeg, .gif, .svg">--}}
{{--                    			</div>--}}
{{--                    		</div>--}}
                    	</div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">submit</button>
                    </div>
                </div>
            </form>
        </div>



        <div class="col-md-12">
            <form action="{{ route('admin.setting.save') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card ">
                    <div class="card-header card-header-primary card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">add</i>
                        </div>
                        <h5 class="card-title">Footer</h5>
                    </div>
                    <div class="card-body ">
                    	<div class="row">
                    		<div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    			<div class="form-group">
                    				<label for="copyright_text">Copyright Text</label>
                    				<input type="text" name="copyright_text" id="copyright_text" class="form-control" value="{{ $setting['copyright_text'] ?? ''}}" autocomplete="off">
                    			</div>
                    		</div>
                    	</div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
