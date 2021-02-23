@if(Auth::check())
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
			<textarea name="inputContent" rows="6" cols="80">{{$posts->content}}</textarea>
		</div>
	</div>
	<div class="form-group row">
		<label for="inputImage" class="col-sm-2 col-form-label">Image</label>
		<div class="col-sm-3">
			<input type="file" class="form-control-file" name="inputImage" id="exampleFormControlFile1">
		</div>
	</div>

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