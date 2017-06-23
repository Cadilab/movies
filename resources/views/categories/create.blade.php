@extends('backend.content')


@section('title')
	Create a new category
@endsection

@section('content')

	<h4>Create a new category</h4>
	<hr>

	<p>In this section, you as an administrator of the website can create movie categories.
	Catagories are used to connect movies with specific categories so when user wants to search for a movie it connects him to it based on a category
	and other aspects.</p>

	<form class="form-horizontal" method="POST" action="{{ route('store_category') }}">

	{{ csrf_field() }}

	<div class="form-group">
		<div class="col-xs-4">
		    <label for="name">Category name:</label>
		    <input class="form-control" id="name" name="name" type="text">
		</div>
	</div>

	<button class="btn btn-primary">Add</button>

	</form>
@endsection