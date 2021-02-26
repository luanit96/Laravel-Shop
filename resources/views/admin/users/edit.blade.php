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
	Update Users
</div>
<form method="post" action="{{route('users.update',[$user->id])}}">
	{{csrf_field()}}

	<input type="hidden" name="_method" value="PUT">
	
	<div class="form-group row">
		<label for="inputUsername" class="col-sm-2 col-form-label">User Name</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="inputUsername" name="inputUsername" value="{{$user->name}}">
		</div>
	</div>

	<div class="form-group row">
		<label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="inputEmail" name="inputEmail" value="{{$user->email}}">
		</div>
	</div>

	<div class="form-group row">
		<label for="inputPassword" class="col-sm-2 col-form-label">New Password</label>
		<div class="col-sm-10">
			<input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Nhập mật khẩu mới">
		</div>
	</div>

	<div class="form-group row">
		<label for="inputConfirmPassword" class="col-sm-2 col-form-label">Confirm Password</label>
		<div class="col-sm-10">
			<input type="password" class="form-control" id="inputConfirmPassword" name="inputConfirmPassword" placeholder="Nhập lại mật khẩu mới">
		</div>
	</div>

	<fieldset class="form-group">
		<div class="row">
			<label class="col-sm-2 col-form-label">Access</label>
			<div class="col-sm-10">
				<div class="form-check">
					<label class="radio-inline"><input type="radio" name="inputAccess" value="1" <?php if($user->access == 1) echo "checked";?>>Admin</label>
				</div>
				<div class="form-check">
					<label class="radio-inline"><input type="radio" name="inputAccess" value="0" <?php if($user->access == 0) echo "checked";?>>Editor</label>
				</div>
			</div>
		</div>
	</fieldset>

	<div class="form-group row">
		<div class="col-sm-10">
			<button type="submit" class="btn btn-primary">Cập nhật</button>
		</div>
	</div>
</form>
@endsection
@endif