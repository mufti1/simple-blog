@extends('layouts.postTemplate')

@section('title', 'Blog Public Home Page')

@section('content')

<div class="container">
	<div class="row">
		<h1>Top 10 POST</h1>
		@foreach ($posts as $post)
		<div class="jumbotron">
			<h1 class="display-3">{{ $post->title }}</h1>
			<?php echo  $post->body;?>
			<p class="lead">
				<a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
			</p>
		</div>
		@endforeach
	</div>
	<div class="text-center">
		{{ $posts->links() }}
	</div>
</div>
@endsection