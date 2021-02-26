@extends('layouts.app')
@section('content')
<div class="inner-header">
	<div class="container">
		<div class="pull-left">
			<h6 class="inner-title">Sản phẩm {{$sanpham->productname}}</h6>
		</div>
		<div class="pull-right">
			<div class="beta-breadcrumb font-large">
				<a href="{{route('home')}}">Home</a> / <span>Thông tin chi tiết sản phẩm</span>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>

<div class="container">
	<div id="content">
		<div class="row">
			<div class="col-sm-9">

				<div class="row">
					<div class="col-sm-4">
						<img src="{{$sanpham->image}}" alt="{{$sanpham->productname}}">
					</div>
					<div class="col-sm-8">
						<div class="single-item-body">
							<p class="single-item-title">{{$sanpham->productname}}</p>
							<p class="single-item-price">
								@if($sanpham->saleprice==0)
								<span>{{$sanpham->price}} $
								</span>
								@else
								<span class="flash-del">{{$sanpham->price}} $</span>
								<span class="flash-sale">{{$sanpham->saleprice}} $
								</span>
								@endif
							</p>
						</div>

						<div class="clearfix"></div>
						<div class="space20">&nbsp;</div>
						<div class="space20">&nbsp;</div>

						<p>Số lượng:</p>
						<div class="single-item-options">
							<select class="wc-select" name="size">
								<option>Số lượng</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
							</select>
							<a class="add-to-cart" href="{{route('themgiohang',$sanpham->productid)}}"><i class="fa fa-shopping-cart"></i></a>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>

				<div class="space40">&nbsp;</div>
				<div class="woocommerce-tabs">
					<ul class="tabs">
						<li><a href="#tab-description">Mô tả</a></li>
					</ul>

					<div class="panel" id="tab-description">
						{!! $sanpham->detail !!}
					</div>
				</div>
				<div class="space50">&nbsp;</div>
				<div class="beta-products-list">
					<h4>Sản phẩm tương tự</h4>

					<div class="row">
						@foreach($sp_tuongtu as $sptt)
						<div class="col-sm-4">
							<div class="single-item">
								@if($sptt->saleprice!=0)
								<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
								@endif
								<div class="single-item-header">
									<a href="{{route('chitietsanpham',$sptt->productid)}}"><img src="{{$sptt->image}}" alt="{{$sptt->productname}}" height="250px"></a>
								</div>
								<div class="single-item-body">
									<p class="single-item-title">{{$sptt->productname}}</p>
									<p class="single-item-price">
										@if($sptt->saleprice==0)
										<span>{{$sptt->price}} $
										</span>
										@else
										<span class="flash-del">{{$sptt->price}} $</span>
										<span class="flash-sale">{{$sptt->saleprice}} $
										</span>
										@endif
									</p>
								</div>
								<div class="single-item-caption">
									<a class="add-to-cart pull-left" href="{{route('themgiohang',$sptt->productid)}}"><i class="fa fa-shopping-cart"></i></a>
									<a class="beta-btn primary" href="{{route('chitietsanpham',$sptt->productid)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div> <!-- .beta-products-list -->
			</div>
		</div>
	</div> <!-- #content -->
</div> <!-- .container -->
@endsection