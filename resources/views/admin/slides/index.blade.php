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
				Table Slides
			</div>
			<a style="margin: 15px 15px 0 25px" class="btn btn-primary" href="../admin/slides/create" role="button">Thêm mới</a>
		</div>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table style="text-align: center" class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>ID</th>
						<th>SlideName</th>
						<th>Link</th>
						<th>Image</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($slides as $slide)
					<tr>
						<td>{{$slide->slideid}}</td>
						<td>{{$slide->slidename}}</td>
						<td>{{$slide->link}}</td>
						<td><img src="{{$slide->image}}" alt="{{$slide->slidename}}" width="200px" height="80px"></td>
						<td>
							<a href='slides/{{$slide->slideid}}/edit'><i class="fas fa-edit"></i>Edit</a>
							<form action="{{route('slides.destroy',[$slide->slideid])}}" method=post>
								{{csrf_field()}}
								{{method_field('DELETE')}}
								<input type="submit" class="btn btn-danger" value="Delete" onclick= "return confirm('Bạn có chắc muốn xóa?')">
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