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
	Update Categories
</div>
<form method="post" action= "{{route('categories.update',[$category->catid])}}">
	{{csrf_field()}}
	<input type="hidden" name="_method" value="PUT">

	<div class="form-group row">
		<label for="inputCatid" class="col-sm-2 col-form-label">Category Id</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="inputCatid" name="inputCatid" value="{{$category->catid}}"  disabled="disabled">
		</div>
	</div>

	<div class="form-group row">
		<label for="inputCatname" class="col-sm-2 col-form-label">Category Name</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="inputCatname" name="inputCatname" value="{{$category->catname}}" placeholder="Nhập vào Category Name">
		</div>
	</div>

	<div class="form-group row">
		<label for="selectParent" class="col-sm-2 col-form-label">Parent</label>
		<div class="col-sm-10">
			<select class="custom-select" name="selectParent" required id="selectParent">
				<option value="{{$category->catid}}">{{$category->catname}}</option>
			</select>
		</div>
	</div>

	<div class="form-group row">
		<label for="inputOrderItem" class="col-sm-2 col-form-label">Order Item</label>
		<div class="col-sm-10">
			<input type="number" class="form-control" name="inputOrderItem" min="1" max="3" id="inputOrderItem" value="{{$category->orderitem}}" placeholder="1">
		</div>
	</div>

	<fieldset class="form-group">
		<div class="row">
			<label class="col-sm-2 col-form-label">Public</label>
			<div class="col-sm-10">
				<div class="form-check">
					<label class="radio-inline"><input type="radio" name="radioPublic" value="1" <?php if($category->public == 1) echo "checked"; ?>>Yes</label>
				</div>
				<div class="form-check">
					<label class="radio-inline"><input type="radio" name="radioPublic" value="0" <?php if($category->public == 0) echo "checked"; ?>>No</label>
				</div>
			</div>
		</div>
	</fieldset>

	<fieldset class="form-group">
		<div class="row">
			<label class="col-sm-2 col-form-label">Has Child</label>
			<div class="col-sm-10">
				<div class="form-check">
					<label class="radio-inline"><input type="radio" name="radioHasChild" value="1" <?php if($category->haschild == 1) echo "checked"; ?>>Yes</label>
				</div>
				<div class="form-check">
					<label class="radio-inline"><input type="radio" name="radioHasChild" value="0" <?php if($category->haschild == 0) echo "checked"; ?>>No</label>
				</div>
			</div>
		</div>
	</fieldset>
	<div class="form-group row">
		<div class="col-sm-10">
			<button type="submit" class="btn btn-primary">Cập nhật</button>
		</div>
	</div>
</form>
@endsection
@endif