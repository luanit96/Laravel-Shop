@extends('layouts.app')
@section('content')
<div class="inner-header">
	<div class="container">
		<div class="pull-left">
			<h6 class="inner-title">Giới thiệu</h6>
		</div>
		<div class="pull-right">
			<div class="beta-breadcrumb font-large">
				<a href="{{route('home')}}">Home</a> / <span>Giới thiệu</span>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<div class="container">
	<div id="content">
		<div class="our-history">
			<div class="history-slider">
				<div class="history-navigation">
					<a data-slide-index="0" href="blog_with_2sidebars_type_e.html" class="circle"><span class="auto-center">1</span></a>
					<a data-slide-index="1" href="blog_with_2sidebars_type_e.html" class="circle"><span class="auto-center">2</span></a>
					<a data-slide-index="2" href="blog_with_2sidebars_type_e.html" class="circle"><span class="auto-center">3</span></a>
					<a data-slide-index="3" href="blog_with_2sidebars_type_e.html" class="circle"><span class="auto-center">4</span></a>
					<a data-slide-index="4" href="blog_with_2sidebars_type_e.html" class="circle"><span class="auto-center">5</span></a>
					<a data-slide-index="5" href="blog_with_2sidebars_type_e.html" class="circle"><span class="auto-center">6</span></a>
					<a data-slide-index="6" href="blog_with_2sidebars_type_e.html" class="circle"><span class="auto-center">7</span></a>
				</div>

				<div class="history-slides">
					@foreach($introdures as $introduce)
					<div> 
						<div class="row">
							<div class="col-sm-5">
								<img src="{{$introduce->image}}" width="470px" height="320px" alt="{{$introduce->title}}">
							</div>
							<div class="col-sm-7">
								<h5 class="other-title">{{$introduce->title}}</h5>
								<div class="space20">&nbsp;</div>
								{!!$introduce->content!!}
							</div>
						</div> 
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div> <!-- #content -->
</div> <!-- .container -->
@endsection