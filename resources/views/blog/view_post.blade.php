@extends('layouts.viewTemplate')

@section('title', 'View Post'.$id)

@section('content')
	<div class="row">
		<h1>{{ $post->title }}</h1>
		<?php echo  $post->body;?>
	</div>

	<div class="row">
		<div class="text-center">
			<div class="fb-comments" data-href="http://localhost:8000/posts/{{ $id }}" data-numposts="5"></div>
		</div>
	</div>
@endsection