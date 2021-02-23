@if(Auth::check())
@section('content')
<div class="card mb-3">
	<div class="row">
		<div class="col-md-12">
			<div class="card-header">
				<i class="fas fa-table"></i>
				Table Categories
			</div>
			<a style="margin: 15px 15px 0 25px" class="btn btn-primary" href="../admin/categories/create" role="button">Thêm mới</a>
		</div>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>CatID</th>
						<th>CatName</th>
						<th>Parent</th>
						<th>OrderItem</th>
						<th>HasChild</th>
						<th>Public</th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($categories as $category)
					<tr>
						<td>{{$category->catid}}</td>
						<td>{{$category->catname}}</td>
						<td>{{$category->parent}}</td>
						<td>{{$category->orderitem}}</td>
						<td>{{$category->haschild}}</td>
						<td>{{$category->public}}</td>
						<td>
							<a href='categories/{{$category->catid}}/edit'><i class="fas fa-edit"></i>Edit</a>
						</td>
						<td>
							<form action="{{route('categories.destroy',[$category->catid])}}" method=post>
								{{csrf_field()}}
								{{method_field('DELETE')}}
								<input type="submit" value="Delete" class="btn btn-danger"onClick= "return confirm('Ban co chac la muon
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