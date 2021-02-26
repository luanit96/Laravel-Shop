@if(Auth::check() && Auth::user()->access === 1) 
@extends('layouts.admin')
@section('content')
<div class="card mb-3">
	<div class="row">
		<div class="col-md-12">
			@if(session()->has('message'))
			<div class="alert alert-success">
			{{ session()->get('message') }}
			</div>
			@endif
			<div class="card-header">
				<i class="fas fa-table"></i>
				Table Posts
			</div>
			<a style="margin: 15px 15px 0 25px" class="btn btn-primary" href="../admin/posts/create" role="button">Thêm mới</a>
		</div>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>ID</th>
						<th>Title</th>
						<th>Content</th>
						<th>Image</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($posts as $post)
					<tr>
						<td>{{$post->postid}}</td>
						<td>{{$post->title}}</td>
						<td>{!!$post->content!!}</td>
						<td><img src="{{$post->image}}" alt="Images" width="80px" height="50px"></td>
						<td>
							<a href='posts/{{$post->postid}}/edit'><i class="fas fa-edit"></i>Edit</a>
							<form action="{{route('posts.destroy',[$post->postid])}}" method=post>
								{{csrf_field()}}
								{{method_field('DELETE')}}
								<input type="submit" value="Delete" class="btn btn-danger" onclick= "return confirm('Bạn có chắc muốn xóa ?')">
							</form>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection
@endif