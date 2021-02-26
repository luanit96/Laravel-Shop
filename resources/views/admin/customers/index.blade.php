@if(Auth::check() && Auth::user()->access === 1) 
@extends('layouts.admin')
@section('content')
<div class="card mb-3">
	<div class="card-header">
		<i class="fas fa-table"></i>
		Table Customers
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table style="text-align: center" class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
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
</div>
@endsection
@endif