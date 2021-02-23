@if(Auth::check())
@section('content')
@if(session()->has('message'))
<div class="alert alert-success">
{{ session()->get('message') }}
</div>
@endif
<div class="card-header">
	<i class="fas fa-table"></i>
	Create Categories
</div>
<form method="post" action="{{route('categories.store')}}">
	{{csrf_field()}}
	
	<div class="form-group row">
		<label for="inputCatname" class="col-sm-2 col-form-label">Category Name</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="inputCatname" name="inputCatname" placeholder="Nhập vào Category Name">
		</div>
	</div>

	<div class="form-group row">
		<label for="selectParent" class="col-sm-2 col-form-label">Parent</label>
		<div class="col-sm-10">
			<select class="custom-select" name="selectParent" required id="selectParent">
				<option value="0" selected>0</option>
				@foreach($categories as $category)
				<option value="{{$category->catid}}">{{$category->catname}}</option>
				@endforeach
			</select>
		</div>
	</div>

	<div class="form-group row">
		<label for="inputOrderItem" class="col-sm-2 col-form-label">Order Item</label>
		<div class="col-sm-10">
			<input type="number" class="form-control" name="inputOrderItem" id="inputOrderItem" placeholder="1">
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

	<fieldset class="form-group">
		<div class="row">
			<label class="col-sm-2 col-form-label">Has Child</label>
			<div class="col-sm-10">
				<div class="form-check">
					<label class="radio-inline"><input type="radio" name="radioHasChild" value="1" checked>Yes</label>
				</div>
				<div class="form-check">
					<label class="radio-inline"><input type="radio" name="radioHasChild" value="0" checked>No</label>
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