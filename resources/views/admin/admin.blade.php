@extends('layouts.template')

@section('title', 'Blog Admin Panel')

@section('content')
<h1>Admin Panel</h1>
<nav class="navbar navbar-light">
	<ul class="nav navbar-nav">
		<li><a href="{{ route('posts.create') }}" class="glyphicon glyphicon-plus"></a></li>
	</ul>
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
<table class="table">
	<thead>
		<th>Id</th>
		<th>Title</th>
		<th>Content</th>
		<th colspan="2">Action</th>
	</thead>

	<tbody>
		@foreach($posts as $post)
		<tr>
			<th>{{ $post->id }}</th>
			<td>{{ $post->title }}</td>
			<td>{{ $post->body }}</td>
			<td><a href="#"><span class="glyphicon glyphicon-pencil"></span></a></td>
			<td><a href="#"><span class="glyphicon glyphicon-trash"></span></a></td>
		</tr>
		@endforeach
	</tbody>
</table>
@endsection
