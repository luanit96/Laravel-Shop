@if(Auth::check())
@section('content')
<div class="card mb-3">
	<div class="row">
		<div class="col-md-12">
			<div class="card-header">
				<i class="fas fa-table"></i>
				Table Products
			</div>
			<a style="margin: 15px 15px 0 25px" class="btn btn-primary" href="../admin/products/create" role="button">Thêm mới</a>
		</div>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table id="dataTable" class="table table-bordered table-striped" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>ProductID</th>
						<th>CatID</th>
						<th>ProductName</th>
						<th>Price</th>
						<th>Sale Price</th>
						<th>Image</th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($products as $product)
					<tr>
						<td>{{$product->productid}}</td>
						<td>{{$product->catid}}</td>
						<td>{{$product->productname}}</td>
						<td>{{$product->price}}$</td>
						<td>{{$product->saleprice}}$</td>
						<td><img src="../source/image/product/{{$product->image}}" alt="Images" width="80px" height="50px"></td>
						<td>
							<a href='products/{{$product->productid}}/edit'><i class="fas fa-edit"></i>Edit</a>
						</td>
						<td>
							<form action="{{route('products.destroy',[$product->productid])}}" method=post>
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