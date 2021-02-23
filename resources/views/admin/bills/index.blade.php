@if(Auth::check())
@section('content')
<div class="card mb-3">
	<div class="card-header">
		<i class="fas fa-table"></i>
		Table Bills
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>ID</th>
						<th>CustomerID</th>
						<th>total</th>
						<th>payment</th>
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
	<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>
@endsection
@else
@extends('layouts.admin')
@endif