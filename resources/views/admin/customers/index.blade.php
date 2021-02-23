@if(Auth::check())
@section('content')
<div class="card mb-3">
	<div class="card-header">
		<i class="fas fa-table"></i>
		Table Customers
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Gender</th>
						<th>Email</th>
						<th>Address</th>
						<th>Phone</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($customers as $customer)
					<tr>
						<td>{{$customer->customerid}}</td>
						<td>{{$customer->customername}}</td>
						<td>{{$customer->gender}}</td>
						<td>{{$customer->email}}</td>
						<td>{{$customer->address}}</td>
						<td>{{$customer->phone}}</td>
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