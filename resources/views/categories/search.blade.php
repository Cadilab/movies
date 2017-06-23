@extends('backend.content')

@section('title')
	{{$category_name->name}}
@endsection

@section('content')

	<h4>Movies in {{$category_name->name}} category.</h4>
	<hr>

	<div class="last_added">
		<div class="row" id="content">
				@forelse($movies as $movie)
					<div class="col-md-2 col-sm-4 col-xs-6 film animated fadeInUp">
						<div class="frame">
							<a href="{{ route('display_movie', $movie->id) }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tereddut (2016)">
							<img alt="{{$movie->name}} ({{$movie->year}})" width="214" height="317" class="img-responsive" src="{{route('thumbnail_get',$movie->avatar_name)}}">
							<span class="play animated flip">
								<i class="fa fa-play-circle fa-4x"></i>
							</span>
							</a>
							</div>
							<div class="description">
							<div class="star"><i class="fa fa-star" aria-hidden="true"></i> {{$movie->rating}}/10</div>
							<a href="/tereddut-2016" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Tereddut (2016) sa prevodom"><h2> {{$movie->name}}</h2></a> <h2>({{$movie->year}})</h2>
							<p>
							</p>
						</div>
					</div>

					@empty
						<p>No movies found.</p>
				@endforelse
		</div>
	</div>	
@endsection