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
	Create Users
</div>
<form method="post" action="{{route('users.store')}}">
	{{csrf_field()}}
	
	<div class="form-group row">
		<label for="inputUsername" class="col-sm-2 col-form-label">User Name</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="inputUsername" name="inputUsername" placeholder="Nhập tên">
		</div>
	</div>

	<div class="form-group row">
		<label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="inputEmail" name="inputEmail" placeholder="yyy@gmail.com">
		</div>
	</div>

	<div class="form-group row">
		<label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
		<div class="col-sm-10">
			<input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Nhập mật khẩu">
		</div>
	</div>

	<div class="form-group row">
		<label for="inputConfirmPassword" class="col-sm-2 col-form-label">Confirm Password</label>
		<div class="col-sm-10">
			<input type="password" class="form-control" id="inputConfirmPassword" name="inputConfirmPassword" placeholder="Nhập lại mật khẩu">
		</div>
	</div>

	<fieldset class="form-group">
		<div class="row">
			<label class="col-sm-2 col-form-label">Access</label>
			<div class="col-sm-10">
				<div class="form-check">
					<label class="radio-inline"><input type="radio" name="inputAccess" value="1" checked>Admin</label>
				</div>
				<div class="form-check">
					<label class="radio-inline"><input type="radio" name="inputAccess" value="0" checked>Editor</label>
				</div>
			</div>
		</div>
	</fieldset>

	<div class="form-group row">
		<div class="col-sm-10">
			<button type="submit" class="btn btn-primary">Thêm mới</button>
		</div>
	</div>
</form>
@endsection
@endif