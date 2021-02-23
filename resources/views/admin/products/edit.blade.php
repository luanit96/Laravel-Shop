@if(Auth::check())
@section('content')
@if(session()->has('message'))
<div class="alert alert-success">
	{{ session()->get('message') }}
</div>
@endif
<div class="card-header">
	<i class="fas fa-table"></i>
	Update Products
</div>
<form method="post" action="{{route('products.update',[$product->productid])}}">
	{{csrf_field()}}

	<input type="hidden" name="_method" value="PUT">
	
	<div class="form-group row">
		<label for="inputProductname" class="col-sm-2 col-form-label">Product Name</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="inputProductname" name="inputProductname" value="{{$product->productname}}">
		</div>
	</div>

	<div class="form-group row">
		<label for="selectCatid" class="col-sm-2 col-form-label">Category Name</label>
		<div class="col-sm-10">
			<select class="custom-select" name="selectCatid" required id="selectCatid">
				@foreach($categories as $category)
				<option value="{{$category->catid}}" <?php $a=$category->catid; $b=$product->catid;if($a==$b) echo "selected"?>>{{$category->catname}}</option>
				@endforeach
			</select>
		</div>
	</div>

	<div class="form-group row">
		<label for="inputImage" class="col-sm-2 col-form-label">Image</label>
		<div class="col-sm-3">
			<input type="file" class="form-control-file" name="inputImage" id="inputImage" value="{{$product->image}}">
		</div>
	</div>

	<div class="form-group row">
		<label for="inputDetail" class="col-sm-2 col-form-label">Detail</label>
		<div class="col-sm-10">
			<textarea name=inputDetail id="ckeditor" rows="6" cols="80">{{$product->detail}}</textarea>
		</div>
	</div>

	<div class="form-group row">
		<label for="inputPrice" class="col-sm-2 col-form-label">Price</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="inputPrice" name="inputPrice" value="{{$product->price}}">
		</div>
	</div>

	<div class="form-group row">
		<label for="inputSaleprice" class="col-sm-2 col-form-label">Sale Price</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="inputSaleprice" name="inputSaleprice" value="{{$product->saleprice}}">
		</div>
	</div>

	<div class="form-group row">
		<label for="inputViews" class="col-sm-2 col-form-label">Views</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="inputViews" name="inputViews" value="{{$product->views}}">
		</div>
	</div>

	<fieldset class="form-group">
		<div class="row">
			<label class="col-sm-2 col-form-label">Public</label>
			<div class="col-sm-10">
				<div class="form-check">
					<label class="radio-inline"><input type="radio" name="radioPublic" value="1" <?php if($product->public == 1) echo "checked"; ?>>Yes</label>
				</div>
				<div class="form-check">
					<label class="radio-inline"><input type="radio" name="radioPublic" value="0" <?php if($product->public == 0) echo "checked"; ?>>No</label>
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
@else
@extends('layouts.admin')
@endif