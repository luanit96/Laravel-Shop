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
	Update Posts
</div>
<form method="post" action="{{route('posts.update',[$posts->postid])}}">
	{{csrf_field()}}
	<input type="hidden" name="_method" value="PUT">
	<div class="form-group row">
		<label for="inputTitle" class="col-sm-2 col-form-label">Title</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="inputTitle" name="inputTitle" placeholder="Nhập tên bài viết" value="{{$posts->title}}">
		</div>
	</div>

	<div class="form-group row">
		<label for="inputContent" class="col-sm-2 col-form-label">Content</label>
		<div class="col-sm-10">
			<textarea name="inputContent" id="ckeditor" rows="6" cols="80">{{$posts->content}}</textarea>
		</div>
	</div>
	<div class="form-group row">
		<label for="inputImage" class="col-sm-2 col-form-label">Image</label>
		<div class="col-sm-3">
			<input type="text" value="{{$posts->image}}" class="form-control" name="inputImage" id="ckfinder-input-1" placeholder="Đường dẫn ảnh" required>
			<img src="{{$posts->image}}" width="100%" id="input-img">
			<button id="ckfinder-popup-1">Chọn ảnh</button>
		</div>
	</div>

	<div class="form-group row">
		<div class="col-sm-10">
			<button type="submit" class="btn btn-primary">Cập nhật</button>
		</div>
	</div>
</form>
@endsection
@endif