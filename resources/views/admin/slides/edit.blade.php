@if(Auth::check() && Auth::user()->access === 1) 
@extends('layouts.admin')
@section('content')
@if(session()->has('message'))
<div class="alert alert-success">
{{ session()->get('message') }}
</div>
@endif
<div class="card-header">
	<i class="fas fa-table"></i>
	Update Slides
</div>
<form method="post" action="{{route('slides.update',[$slide->slideid])}}">
	{{csrf_field()}}
	<input type="hidden" name="_method" value="PUT">
	
	<div class="form-group row">
		<label for="inputSlidename" class="col-sm-2 col-form-label">Slide Name</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="inputSlidename" name="inputSlidename" value="{{$slide->slidename}}"placeholder="Nhập vào Slide Name">
		</div>
	</div>

	<div class="form-group row">
		<label for="inputLink" class="col-sm-2 col-form-label">Link
		</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" name="inputLink" id="inputLink" placeholder="link" value="{{$slide->link}}">
		</div>
	</div>

	<div class="form-group row">
		<label for="inputImage" class="col-sm-2 col-form-label">Image</label>
		<div class="col-sm-3">
			<input type="text" value="{{$slide->image}}" class="form-control-file" name="inputImage" id="ckfinder-input-1" required>
			<img src="{{$slide->image}}" width="100%" id="input-img">
			<button id="ckfinder-popup-1">Chọn ảnh</button>
		</div>
	</div>

	<div class="form-group row">
		<div class="col-sm-10">
			<button type="submit" class="btn btn-primary">Cập nhật
			</button>
		</div>
	</div>
</form>
@endsection
@endif