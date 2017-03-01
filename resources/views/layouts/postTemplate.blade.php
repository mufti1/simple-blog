<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<!--[CDN]-->
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
</head>
<body>
	<div class="container-fluid">
		<nav class="navbar navbar-light bg-faded">
			<a class="navbar-brand" href="/">Welcome</a>
			<ul class="nav navbar-nav navbar-right">
				<!-- Authentication Links -->
				@if (Auth::guest())
				<li><a href="{{ route('login') }}">Login</a></li>
				<li><a href="{{ route('register') }}">Register</a></li>
				@else
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
						{{ Auth::user()->name }} <span class="caret"></span>
					</a>

					<ul class="dropdown-menu" role="menu">
						<li>
							<a href="{{ route('logout') }}"
							onclick="event.preventDefault();
							document.getElementById('logout-form').submit();">
							Logout
						</a>

						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							{{ csrf_field() }}
						</form>
					</li>
				</ul>
			</li>
			@endif
		</ul>
	</nav>
</div>
<div class="container">
	<nav class="navbar navbar-ligth">
		<ul class="nav navbar-nav">
			<li class="dropdown">
				<a href="" class="dropdown-toggle" data-toggle="dropdown">Sort By <span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href="{{ route('getPublic', ['type'=>'recentPosts']) }}">Top Recent</a></li>
					<li><a href="{{ route('getPublic', ['type'=>'mostCommented']) }}">Top Comment</a></li>
					<li><a href="{{ route('getPublic', ['type'=>'mostVisited']) }}">Top Visit</a></li>
				</ul>
			</li>
		</ul>
		@if(Auth::check())
		<ul class="nav navbar-nav navbar-right">
			<li><a href="{{ route('posts.index') }}">Manage Post</a></li>
		</ul>
		@endif
	</nav>
</div>
<div class="container">
	<div class="row">
		@yield('content')
	</div>
</div>
<div class="text-center">
	<p>&copy; Copyright Codeshark 2017</p>
</div>
<!--jquery-->
<script  src="https://code.jquery.com/jquery-3.1.1.js" integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA="  crossorigin="anonymous"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>