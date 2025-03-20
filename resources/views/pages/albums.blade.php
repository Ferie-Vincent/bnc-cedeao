@extends('layouts.header')
@section('content')
<main id="content" class="row">

	<div class="large-12 columns">
		<div class="page-title">

			<h1>Albums Galerie Photos</h1>
		</div>
	</div>

	<div id="main" class="medium-12 large-12 columns">

		<span id="gallery-close" class="gallery-back">←</span>
		<ul id="tp-grid" class="tp-grid" style="min-width: 380px; margin-left: 23px; height: 565px;">
		@foreach($albums as $album)
		    @foreach(json_decode($album['image']) as $photo)
			<li data-pile="{{$album['nom']}}" style="transition: left 400ms ease-in-out 0s, top 400ms ease-in-out 0s; visibility: hidden; transform: rotate(0deg); left: 0px; top: 0px; display: list-item;">
				<a href="{{ asset(env('IMAGES_PATH')) }}/{{$photo}}" data-group="1" class="item-overlay gallery popup-link-1">
					<img src="{{ asset(env('IMAGES_PATH')) }}/{{$photo}}" alt="">
				</a>
			</li>
			@endforeach
			<li data-pile="{{$album['nom']}}" style="transition: left 400ms ease-in-out 0s, top 400ms ease-in-out 0s; transform: rotate(0deg); left: 0px; top: 0px; display: list-item;">
				<a href="{{ asset(env('IMAGES_PATH')) }}/{{$photo}}" data-group="1" class="item-overlay gallery popup-link-1">
					<img src="{{ asset(env('IMAGES_PATH')) }}/{{$photo}}" alt="">
				</a>
				<div class="tp-title"><span>{{$album['nom']}}</span><span>{{ count(json_decode($album['image'])) }}</span></div>
			</li>
		@endforeach

		
		</ul>

		<input type="hidden" class="tp_groups" value="5">
		<!--/ .tp-grid-->

		<div class="clear"></div>

	</div>
	<!--/ #main-->

</main>
@endsection
