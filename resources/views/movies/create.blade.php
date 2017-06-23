@extends('backend.content')


@section('title')
	Add a new movie
@endsection

@section('content')

	@if (count($errors) > 0)
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif

	<h4>Add a new movie</h4>
	<hr>

	<p>On this page of the website you can add a new movie and directly upload it on the website. In order to add it you must have openload iframe embed code with proper subtitles. After that you should fill out all other fields that are required and proceed with adding it by clicking 'Add'. After that you will be redirected back to the control panel.</p>

	<form class="form-horizontal" method="POST" action="{{ route('store_movie') }}" enctype="multipart/form-data">

	{{ csrf_field() }}

	<div class="form-group">
		<div class="col-xs-4">
		    <label for="name">Movie name:</label>
		    <input class="form-control" id="name" name="name" type="text" placeholder="Movie name...">
		</div>
	</div>

	<div class="form-group">
		<div class="col-xs-4">
		    <label for="release">Release year:</label>
		    <input class="form-control" id="name" name="release" type="text" placeholder="Release year...">
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-xs-4">
			<label for="description">Short description:</label>
			<textarea class="form-control" id="description" name="description" rows="7" placeholder="Short movie description...."></textarea>
		</div>
	</div>

	<div class="form-group">
		<div class="col-xs-4">
			<label for="embed">Embed code:</label>
			<textarea class="form-control" id="description" name="embed" rows="7" placeholder="Embed code goes here...."></textarea>
		</div>
	</div>

	<div class="form-group">
		<div class="col-xs-4">
		    <label for="actors">Name some actors:</label>
		    <input class="form-control" id="name" name="actors" type="text" placeholder="Actor names...">
		</div>
	</div>


	<div class="form-group">
		<div class="col-xs-4">
		    <label for="rating">Rating:</label>
		    <input class="form-control" id="name" name="rating" type="text" placeholder="IMDB rating...">
		</div>
	</div>

	<div class="form-group">
		<div class="col-xs-4">
			<p>Select categories:</p>
			@forelse($categories as $category)

				<div class="checkbox">
				  <label><input type="checkbox" name="categories[]" value="{{$category->id}}">{{$category->name}}</label>
				</div>

				@empty
					<p> - No categories! Add them first.</p>
			@endforelse
		</div>
	</div>


	<div class="form-group">
		<div class="col-xs-4">
			<label for="thumbnail">Upload a thumbnail:</label>
			<input type="file" name="thumbnail">
		</div>
	</div>

	<button class="btn btn-primary">Add</button>

	</form>

@endsection