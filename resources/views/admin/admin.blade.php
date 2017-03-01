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
		<th colspan="3">Action</th>
	</thead>

	<tbody>
		@foreach($posts as $post)
		<tr>
			<th>{{ $post->id }}</th>
			<td>{{ $post->title }}</td>
			<td>{!! str_limit($post->body, $limit=300 , $end='...') !!}</td>
			<td><a href="{{ route('posts.show', ['id'=>$post->id]) }}"><span class="glyphicon glyphicon-link btn btn-success"></span></a>
				<td><a href="{{ route('posts.edit', ['id'=>$post->id])}}"><span class="glyphicon glyphicon-pencil btn btn-info"></span></a></td>
				<td>
					<form action="{{ route('posts.destroy', ['id'=>$post->id]) }}" method="POST">
						{{ csrf_field() }}
						<input type="hidden" name="_method" value="DELETE">
						<button type="submit" name="Delete" class="btn btn-danger"> <span class="glyphicon glyphicon-trash"></span> </button>
					</form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	@endsection
