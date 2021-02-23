@if(Auth::check())
@section('content')
@if(session()->has('message'))
<div class="alert alert-success">
	{{ session()->get('message') }}
</div>
@endif
<div class="card-header">
	<i class="fas fa-table"></i>
	Create Products
</div>
<form method="post" action="{{route('products.store')}}">
	{{csrf_field()}}
	
	<div class="form-group row">
		<label for="inputProductname" class="col-sm-2 col-form-label">Product Name</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="inputProductname" name="inputProductname" placeholder="Nhập vào Product Name">
		</div>
	</div>

	<div class="form-group row">
		<label for="selectCatid" class="col-sm-2 col-form-label">Category Name</label>
		<div class="col-sm-10">
			<select class="custom-select" name="selectCatid" required id="selectCatid">
				@foreach($categories as $category)
				<option value="{{$category->catid}}" selected>{{$category->catname}}</option>
				@endforeach
			</select>
		</div>
	</div>

	<div class="form-group row">
		<label for="inputImage" class="col-sm-2 col-form-label">Image</label>
		<div class="col-sm-3">
			<input type="file" class="form-control-file" name="inputImage" id="inputImage">
		</div>
	</div>

	<div class="form-group row">
		<label for="inputDetail" class="col-sm-2 col-form-label">Detail</label>
		<div class="col-sm-10">
			<textarea name="inputDetail" id="ckeditor" rows="6" cols="80"></textarea>
		</div>
	</div>

	<div class="form-group row">
		<label for="inputPrice" class="col-sm-2 col-form-label">Price</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="inputPrice" name="inputPrice">
		</div>
	</div>

	<div class="form-group row">
		<label for="inputSaleprice" class="col-sm-2 col-form-label">Sale Price</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="inputSaleprice" name="inputSaleprice">
		</div>
	</div>

	<div class="form-group row">
		<label for="inputViews" class="col-sm-2 col-form-label">Views</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="inputViews" name="inputViews" placeholder="0">
		</div>
	</div>

	<fieldset class="form-group">
		<div class="row">
			<label class="col-sm-2 col-form-label">Public</label>
			<div class="col-sm-10">
				<div class="form-check">
					<label class="radio-inline"><input type="radio" name="radioPublic" value="1" checked>Yes</label>
				</div>
				<div class="form-check">
					<label class="radio-inline"><input type="radio" name="radioPublic" value="0" checked>No</label>
				</div>
			</div>
		</div>
	</fieldset>

	<div class="form-group row">
		<div class="col-sm-10">
			<button type="submit" class="btn btn-primary">Thêm mới</button>
		</div>
	</div>
</form>
@endsection
@else
@extends('layouts.admin')
@endif