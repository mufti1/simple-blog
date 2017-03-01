@extends('layouts.template')

@section('title', 'Edit post #' . $post->id)
@section('content')
<h1>Edit Post</h1>
<div class="col-sm-8 col-sm-offset-2">
	<form action="{{ route('posts.update', ['id'=>$post->id]) }}" method="post">
		{{ csrf_field() }}

		<input type="hidden" name="_method" value="PUT">
		<div class="form-group">
			<label for="title">Title</label>
			<input type="text" name="title" class="form-control" value="{{ $post->title }}"></input>
		</div>
		<div class="form-group">
			<label for="body">Body</label>
			<textarea name="body">{{ $post->body }}</textarea>
		</div>
		<input type="hidden" name="editForm" value="editForm">

		<button type="submit" class="btn btn-primary">Submit</button>
		<a href="{{ route('posts.index') }}" class="btn btn-default pull-right">Go Back</a>
	</form>
</div>
@endsection