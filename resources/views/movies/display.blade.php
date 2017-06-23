@extends('backend.content')

@section('title')
	{{$movie->name}} ({{$movie->year}})
@endsection

@section('content')

	<div class="embed">
		<div class="embed-responsive embed-responsive-16by9">
	       <iframe src="{{ $movie->embed }}" scrolling="no" frameborder="0" width="700" height="430" allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"></iframe>
		</div>
	</div>

	<div class="pull-left">
		<h3>{{$movie->name}}</h3>
	</div>
	<h3 class="text-right">Views: {{$movie->views}}</h3>
	<p>Actors: {{$movie->actors}}</p>

	<br>

	<p>
	Short summary:
	<br>
	{{$movie->description}}
	</p>
	

@endsection