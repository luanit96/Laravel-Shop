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
	Create Slides
</div>
<form method="post" action="{{route('slides.store')}}">
	{{csrf_field()}}
	
	<div class="form-group row">
		<label for="inputSlidename" class="col-sm-2 col-form-label">Slide Name</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="inputSlidename" name="inputSlidename" placeholder="Nhập vào tên ảnh bìa" required>
		</div>
	</div>

	<div class="form-group row">
		<label for="inputLink" class="col-sm-2 col-form-label">Link
		</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" name="inputLink" id="inputLink" placeholder="Đường dẫn của ảnh" required>
		</div>
	</div>

	<div class="form-group row">
		<label for="inputImage" class="col-sm-2 col-form-label">Image</label>
		<div class="col-sm-3">
			<input type="text" value="" class="form-control-file" name="inputImage" id="ckfinder-input-1" placeholder="Đường dẫn ảnh" required>
			<img src="http://localhost/myshop/public/uploads/images/slides/default.jpg" width="100%" id="input-img">
			<button id="ckfinder-popup-1">Chọn ảnh</button>
		</div>
	</div>

	<div class="form-group row">
		<div class="col-sm-10">
			<button type="submit" class="btn btn-primary">Thêm mới</button>
		</div>
	</div>
</form>
@endsection
@endif