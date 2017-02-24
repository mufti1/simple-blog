@extends('layouts.postTemplate')

@section('title', 'Blog Public Home Page')

@section('content')

<div class="container">
	<div class="row">
		<h1>Top 10 POST</h1>
		@foreach ($posts as $post)
		<div class="jumbotron">
			<h2>{{ $post->title }}</h2>
			{!! str_limit($post->body, $limit=300 , $end='...') !!}
			<p class="lead">
				<a class="btn btn-primary btn-lg" href="{{ route('posts.show', ['id'=>$post->id]) }}" role="button">Read More</a>
			</p>
		</div>
		@endforeach
	</div>
	<div class="text-center">
		{{ $posts->links() }}
	</div>
</div>
@endsection