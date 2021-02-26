@if(Auth::check() && Auth::user()->access === 1) 
@extends('layouts.admin')
@section('content')
<div class="card mb-3">
	<div class="card-header">
		<i class="fas fa-table"></i>
		Table Bills
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table style="text-align: center" class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>ID</th>
						<th>CustomerID</th>
						<th>Total</th>
						<th>Payment</th>
						<th>Note</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($bills as $bill)
					<tr>
						<td>{{$bill->billid}}</td>
						<td>{{$bill->customerid}}</td>
						<td>{{$bill->total}}$</td>
						<td>{{$bill->payment}}</td>
						<td>{{$bill->note}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection
@endif