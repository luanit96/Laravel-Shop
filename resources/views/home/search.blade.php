@extends('layouts.app')
@section('content')
<div class="container">
    <div id="content" class="space-top-none">
        <div class="main-content">
            <div class="space60">&nbsp;</div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="beta-products-list">
                        <h4>Tìm Kiếm "{{ $keyWord }}"</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">Tìm thấy {{count($product)}} sản phẩm</p>
                            <div class="clearfix"></div>
                        </div>

                        <div class="row">
                            @foreach($product as $new)
                            <div class="col-sm-3">
                                <div class="single-item">
                                    @if($new->saleprice!=0)
                                    <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                    @endif
                                    <div class="single-item-header">
                                        <a href="{{route('chitietsanpham',$new->productid)}}"><img src="{{$new->image}}" alt="" height="250px"></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{$new->productname}}</p>
                                        <p class="single-item-price">
                                            @if($new->saleprice==0)
                                            <span>{{$new->price}} $
                                            </span>
                                            @else
                                            <span class="flash-del">{{$new->price}} $</span>
                                            <span class="flash-sale">{{$new->saleprice}} $
                                            </span>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="{{route('themgiohang',$new->productid)}}"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="{{route('chitietsanpham',$new->productid)}}">Details <i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div> <!-- .beta-products-list -->
                </div>
            </div> <!-- end section with sidebar and main content -->
        </div> <!-- .main-content -->
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection