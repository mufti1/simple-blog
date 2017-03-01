@extends('layouts.postTemplate')

@section('title', 'Blog Public Home Page')

@section('content')

<div class="container">
	<div class="row">
		<h1>{{ $description }}</h1>
		@foreach ($posts as $post)
		<div class="jumbotron">
			<h2>{{ $post->title }}</h2>
			<hr/>
			{!! str_limit($post->body, $limit=300 , $end='...') !!}
			<p class="lead">
				<a class="btn btn-primary btn-lg" href="{{ route('posts.show', ['id'=>$post->id]) }}" role="button">Read More</a>
			</p>
			<p class="h6">Posted Date : {{ date('F d, Y', strtotime($post->created_at)) }} at {{ date('g:ia', strtotime($post->created_at)) }}</p>
			<p class="h6">Comment : {{ $post->comment_count }}</p>
			<p class="h6">Visitor : {{ $post->visit_count }}</p>
		</div>
		@endforeach
	</div>
	<div class="text-center">
		{{ $posts->links() }}
	</div>
</div>
@endsection