@extends('account.layouts.panel')

@section('content')
<div class="homepage-container">

	<div class="homepage-information">
		<h1 class="content-title">{{ (!empty($post->title) ? $post->title : '') }}</h1>
		<div class="content">
			{!! (!empty($post->content) ? $post->content: '') !!}
		</div>
	</div>
</div>

@endsection