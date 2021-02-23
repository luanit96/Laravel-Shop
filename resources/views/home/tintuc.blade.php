@extends('layouts.app')
@section('content')
<div class="inner-header">
	<div class="container">
		<div class="pull-left">
			<h6 class="inner-title">Tin tức</h6>
		</div>
		<div class="pull-right">
			<div class="beta-breadcrumb font-large">
				<a href="{{route('home')}}">Home</a> / <span>Tin tức</span>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<div class="main-content-posts">
	<div class="container">
		@foreach($posts as $post)
		<div class="row">
			<div class="col-md-3">
				<img class="mr-3" src="source/image/post/{{$post->image}}" alt="Generic placeholder image">
			</div>
			<div class="col-md-9">
				<h5 class="mt-0 mb-1">{{$post->title}}</h5>
				<p>{{$post->content}}</p>
			</div>
		</div>
		@endforeach
	</div>
</div>
@endsection