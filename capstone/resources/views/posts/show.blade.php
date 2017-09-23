@extends ('layouts.master')


@section ('content')

	<h1>{{ $post->title }}</h1>

	<p class="blog-post-meta">{{ $post->created_at->toFormattedDateString()  }}</p>

	{!! $post->body !!}	<br>

	@if (count($post->tags))
		<ul>
			@foreach ($post->tags as $tag)
				<li class="float-right" style="margin-left: 10px; list-style: none;">
					<a href="/posts/tags/{{ $tag->name }}">
						{{ $tag->name }}
					</a>
				</li>
			@endforeach
		</ul><br>
	@endif

	@if(Auth::check())
		{{ Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right']) }}
			{{ Form::hidden('_method', 'DELETE') }}
			{{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
		{{ Form::close() }}

		<div class="pull-left">
			<a href="/posts/{{ $post->id }}/edit" class="btn btn-success" style="margin-right: 10px;">Edit</a>
		</div>
	@endif

	<div class="comments">
		<ul class="list-group">
		@foreach ($post->comments as $comment)
			<li class="list-group-item">
				<strong>
				{{ $comment->created_at->diffForHumans() }}
				</strong>
				{{ $comment->body }}
			</li>			
		@endforeach
		</ul>
	</div>
	<hr>

	@if(Auth::check())
		<div class="card">
			<div class="card-block" style="padding: 20px 20px">
				<form method="POST" action="/posts/{{ $post->id }}/comments">
					{{ csrf_field() }}

					<div class="form-group">
						<textarea class="form-control" name="body" id="comment" placeholder="Your comment here" required></textarea>
					</div>

					<div class="form-group">
						<button class="btn btn-primary" type="submit">Add Comment</button>
					</div>
				</form>

				@include ('layouts.errors')
			</div>
		</div>
	@endif	

@endsection