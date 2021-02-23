@if(Auth::check())
@section('content')
<div class="card mb-3">
	<div class="row">
		<div class="col-md-12">
			<div class="card-header">
				<i class="fas fa-table"></i>
				Table Slides
			</div>
			<a style="margin: 15px 15px 0 25px" class="btn btn-primary" href="../admin/slides/create" role="button">Thêm mới</a>
		</div>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>ID</th>
						<th>SlideName</th>
						<th>Link</th>
						<th>Image</th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($slides as $slide)
					<tr>
						<td>{{$slide->slideid}}</td>
						<td>{{$slide->slidename}}</td>
						<td>{{$slide->link}}</td>
						<td><img src="../source/image/slide/{{$slide->image}}" alt="Images" width="150px" height="80px"></td>
						<td>
							<a href='slides/{{$slide->slideid}}/edit'><i class="fas fa-edit"></i>Edit</a>
						</td>
						<td>
							<form action="{{route('slides.destroy',[$slide->slideid])}}" method=post>
								{{csrf_field()}}
								{{method_field('DELETE')}}
								<input type="submit" class="btn btn-danger" value="Delete" onClick= "return confirm('Ban co chac la muon
								xoa ?');">
							</form>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
	<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>
@endsection
@else
@extends('layouts.admin')
@endif