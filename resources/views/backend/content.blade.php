<!DOCTYPE html>
<html lang="en">
<head>
	<title>@yield('title')</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://bootswatch.com/simplex/bootstrap.min.css">
	<link rel="stylesheet" href="/css/custom.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css' rel='stylesheet' type='text/css'>
</head>
<body>

<!-- NAVIGATION BAR GOES HERE -->
<nav class="navbar navbar-default">
	<div class="container">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span> 
	      </button>

		<div class="logo">
			<a href="{{ route('index') }}"></a>
		</div>

	    </div>

	    <div class="collapse navbar-collapse" id="myNavbar">
	    	<ul class="nav navbar-nav">
	    	    <li><a href="{{ route('index') }}">Home</a></li>
	    	    <li><a href="{{ route('display_popular') }}">Most popular</a></li>

				<li class="dropdown">
			        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Categories
			        <span class="caret"></span></a>
			        <ul class="dropdown-menu">

			      	  @php

			      	 	$categories = App\Categories::get();

			      	 	foreach($categories as $category)
			      	 	{
			      	 		echo '
			      	 			<li><a href="/s/cat/',$category->id,'">', $category->name ,'</a></li>
			      	 		';
			      	 	}

			      	  @endphp
			        </ul>
				 </li>
	    	</ul>

			<form class="navbar-form navbar-right">
			  <div class="input-group">
			    <input type="text" class="form-control" placeholder="Search for movies...">
			    <div class="input-group-btn">
			      <button class="btn btn-default" type="submit">
			        <i class="glyphicon glyphicon-search"></i>
			      </button>
			    </div>
			  </div>
			</form>
	    </div>
	</div>
</nav>

<!-- CONTENT OF THE WEB SITE GOES HERE-->

<div class="container">
	@yield('content')
</div>

<!-- FOOTER IS DEFINED HERE -->

<footer>
	<div class="container">
	<hr>
	<div class="pull-left">
	<p>
		<a href="https://www.twitter.com/PopcornSrbija" target="_blank" title="Twitter" class="twitter"><i class="fa fa-twitter"></i> About us</a>
		<a href="{{ route('dmca') }}" target="_blank" title="dmca">DMCA</a>
	</p>
	<p>
	</p>
	</div>
	<p class="text-right">Copyright &copy; 2017 Watch Movies Online. All rights reserved.</p>

	</div>
</footer>

<!-- JAVASCRIPT INCLUDES AND FUNCTIONS GO HERE -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>