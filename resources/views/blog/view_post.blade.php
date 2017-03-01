@extends('layouts.viewTemplate')

@section('title', 'View Post #'. $id)

@section('content')
<div id="fbCommentCount" style="display: none;">
<!-- pada localhost comment count masih error ketika di hosting hapus aja angka 0 di value span -->
	<span class="fb-comments-count" data-href="{{ Request::url() }}">0</span>
</div>
<form style="display: none;" name="form" action="{{ route('posts.update', ['id'=>$id]) }}" method="POST">
	{{ csrf_field() }}
	<input type="hidden" name="_method" value="PUT">

	<input type="text" name="commentCount" id="fbFormCommentCount">
	<input type="text" name="visitCount" id="hiddenFormPostVisitCounter" value="{{ $post->visit_count }}">
	<input type="submit" value="submit">
</form>
<div class="row">
	<h1>{{ $post->title }}</h1>
	{!! $post->body !!}
</div>

<div class="row text-center" id="facebookCommentContainer">
	<div class="fb-comments" data-href="{{ Request::url() }}" data-width="800" data-numposts="10"></div>
</div>
<script>
	let fbCommentCount = document.getElementById('fbCommentCount').getElementsByClassName('fb-comments-count');

	setTimeout( function() {
		document.getElementById('fbFormCommentCount').value = fbCommentCount[0].innerHTML;

		let $formVar = $('form');

		let visitCount = document.getElementById('hiddenFormPostVisitCounter').value;

		let visitCountPlusOne = parseInt(visitCount) + 1;

		document.getElementById('hiddenFormPostVisitCounter').value = visitCountPlusOne;

		$.ajax({
			url: $formVar.prop('{{ route('posts.update', ['id'=>$id]) }}'),
			type: 'PUT',
			method: 'PUT',
			data: $formVar.serialize(),
		});
	}, 1000);
</script>
@endsection