@if(Auth::check())
@section('content')
<div class="card mb-3">
	<div class="row">
		<div class="col-md-12">
			<div class="card-header">
				<i class="fas fa-table"></i>
				Table Users
			</div>
			<a style="margin: 15px 15px 0 25px" class="btn btn-primary" href="../admin/users/create" role="button">Thêm mới</a>
		</div>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Email</th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($users as $user)
					<tr>
						<td>{{$user->id}}</td>
						<td>{{$user->name}}</td>
						<td>{{$user->email}}</td>
						<td>
							<a href='users/{{$user->id}}/edit'><i class="fas fa-edit"></i>Edit</a>
						</td>
						<td>
							<form action="{{route('users.destroy',[$user->id])}}" method="post">
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