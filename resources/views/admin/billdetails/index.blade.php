@if(Auth::check() && Auth::user()->access === 1) 
@extends('layouts.admin')
@section('content')
<div class="card mb-3">
	<div class="col-md-12">
		<div class="card-header">
			<i class="fas fa-table"></i>
			Table BillDetails
		</div>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table style="text-align: center" class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>ID</th>
						<th>BillID</th>
						<th>ProductID</th>
						<th>Quantity</th>
						<th>Price</th>
						<th>SalePrice</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($billdetails as $billdetail)
					<tr>
						<td>{{$billdetail->bill_detailid}}</td>
						<td>{{$billdetail->billid}}</td>
						<td>{{$billdetail->productid}}</td>
						<td>{{$billdetail->quantity}}</td>
						<td>{{$billdetail->price}}$</td>
						<td>{{$billdetail->saleprice}}$</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection
@endif