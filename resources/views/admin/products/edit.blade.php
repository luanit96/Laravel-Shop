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
	Update Products
</div>
<form method="post" action="{{route('products.update',[$product->productid])}}">
	{{csrf_field()}}

	<input type="hidden" name="_method" value="PUT">
	
	<div class="form-group row">
		<label for="inputProductname" class="col-sm-2 col-form-label">Product Name</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="inputProductname" name="inputProductname" value="{{$product->productname}}" required>
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
			<input type="text" value="{{$product->image}}" class="form-control-file" name="inputImage" id="ckfinder-input-1" required>
			<img src="{{$product->image}}" alt="{{$product->productname}}" width="100%" id="input-img">
			<button id="ckfinder-popup-1">Chọn ảnh</button>
		</div>
	</div>

	<div class="form-group row">
		<label for="inputDetail" class="col-sm-2 col-form-label">Detail</label>
		<div class="col-sm-10">
			<textarea name=inputDetail id="ckeditor" rows="6" cols="80" required>{{$product->detail}}</textarea>
		</div>
	</div>

	<div class="form-group row">
		<label for="inputPrice" class="col-sm-2 col-form-label">Price</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="inputPrice" name="inputPrice" value="{{$product->price}}" required>
		</div>
	</div>

	<div class="form-group row">
		<label for="inputSaleprice" class="col-sm-2 col-form-label">Sale Price</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="inputSaleprice" name="inputSaleprice" value="{{$product->saleprice}}" required>
		</div>
	</div>

	<fieldset class="form-group">
		<div class="row">
			<label class="col-sm-2 col-form-label">Public</label>
			<div class="col-sm-10">
				<div class="form-check">
					<label class="radio-inline">
						<input type="radio" name="radioPublic" value="1" <?php if($product->public == 1) echo "checked"; ?> required>
						Yes
					</label>
				</div>
				<div class="form-check">
					<label class="radio-inline">
						<input type="radio" name="radioPublic" value="0" <?php if($product->public == 0) echo "checked"; ?> required>
						No
					</label>
				</div>
			</div>
		</div>
	</fieldset>

	<div class="form-group row">
		<div class="col-sm-10">
			<button type="submit" class="btn btn-primary" name="submited">Cập nhật</button>
		</div>
	</div>
</form>
@endsection
@endif