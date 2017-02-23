@extends('layouts.template')

@section('title', 'Add New Post')
@section('content')
<h1>Add New Post</h1>
<div class="col-sm-8 col-sm-offset-2">
	<form action="{{ route('posts.store') }}" method="post">
		{{ csrf_field() }}
		<div class="form-group">
			<label for="title">Title</label>
			<input type="text" name="title" class="form-control"></input>
		</div>
		<div class="form-group">
			<label for="body">Body</label>
			<textarea name="body"></textarea>
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
		<a href="{{ route('posts.index') }}" class="btn btn-default pull-right">Go Back</a>
	</form>
</div>
@endsection