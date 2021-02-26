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
				Table Users
			</div>
			<a style="margin: 15px 15px 0 25px" class="btn btn-primary" href="../admin/users/create" role="button">Thêm mới</a>
		</div>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table style="text-align: center" class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Email</th>
						<th>Action</th>
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
							@if($user->access !== 1)
							<form action="{{route('users.destroy',[$user->id])}}" method="post">
								{{csrf_field()}}
								{{method_field('DELETE')}}
								<input type="submit" class="btn btn-danger" value="Delete" onclick= "return confirm('Bạn có chắc muốn xóa?')">
							</form>
							@endif
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