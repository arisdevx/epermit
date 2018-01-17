@extends('account.layouts.home')

@section('content')

	@if(!$sliders->isEmpty())
	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			@php($navigation = 0)
			@foreach($sliders as $slider)
				<li data-target="#carousel-example-generic" data-slide-to="{{ $navigation }}"{{ ($navigation == 0 ? ' class="active"' : '') }}></li>
				@php($navigation++)
			@endforeach
		</ol>

		<div class="carousel-inner" role="listbox" style="height: 400px !important;" >
			@php($nav = 0)
			@foreach($sliders as $slider)
				<div class="item{{ ($nav == 0 ? ' active' : '') }}">
					<img src="{{ asset('img/slider/' . $slider->image) }}" alt="...">
					<div class="carousel-caption">
						{{ $slider->title }}
					</div>
				</div>

				@php($nav++)
			@endforeach
		</div>

		<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
	@endif
	<div class="homepage-container" style="padding-top: 20px;">
	<div class="banner">
		{{-- <img src="{{ asset('img/banner.png') }}" class="img-responsive img-rounded"> --}}
	</div>
	{{-- <div class="panel panel-home">
		<div class="panel-heading">
			<div class="row">
				<div class="col-md-9">
					<h2 class="panel-title">Maklumat</h2>
				</div>
				<div class="col-md-3">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Search for...">
						<span class="input-group-btn">
							<button class="btn btn-default" type="button">Go!</button>
						</span>
					</div>
				</div>
			</div>
		</div>
		<div class="panel-body">
			<h3>Senarai Maklumat</h3>
			<div id="demo">
				<div class="data-container"></div>
			</div>
			<ol class="information-list">
				@if(!$posts->isEmpty())
					@foreach($posts as $post)
						<li><a href="{{ url('maklumat/' . $post->id) }}">{{ $post->title }}</a></li>
					@endforeach
				@else
					<h4>Tidak ada maklumat</h4>
				@endif
			</ol>
		</div>
	</div> --}}
	<div class="row">
			<div class="col-md-8 col-sm-12">
				<div class="panel panel-home2" style="padding: 3% 40px;">
					{!! $homepage->setting_value !!}
				</div>
			</div>
			<div class="col-md-4 col-sm-12">
				<div style="padding: 20px 40px; border-right: solid 1px lightgray;">
					{!! $footer->setting_value !!}
				</div>
			</div>

	</div>
</div>

@endsection