@extends ('layouts.master')


@section ('content')

	<h1>{{ $post->title }}</h1>

	<p class="blog-post-meta"><strong>{{ $post->user->name }} </strong> on {{ $post->created_at->toFormattedDateString()  }}</p>

	<div class="text-justify">{!! $post->body !!}</div>
		
	<br>

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
		@if(Auth::user()->id == $post->user->id)
		{{ Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-right']) }}
			{{ Form::hidden('_method', 'DELETE') }}
			{{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
		{{ Form::close() }}

		<div class="float-left">
			<a href="/posts/{{ $post->id }}/edit" class="btn btn-success" style="margin-right: 10px;">Edit</a>
		</div>
		@endif
	@endif

	<br>

	<div class="comments">
		<ul class="list-group">
		@foreach ($post->comments as $comment)
			<li class="list-group-item">
				<div class="col-md-9">
					<strong>
					{{ $comment->user->name }}&nbsp 
					</strong>
					{{ $comment->created_at->diffForHumans() }}:
					<br>
					{{ $comment->body }}
				</div>
				<div class="col-md-3">
					<a href="" class="float-right">Delete</a>
					<a data-toggle="modal" style="margin-right: 10px" data-id="{{ $comment->id }}" 
					title="edit" class="float-right editComment">Edit</a>
				</div>
			</li>			
		@endforeach
		</ul>
	</div>
	<hr>

	@if(Auth::check())
		<div class="card">
			<div class="card-block" style="padding: 20px 20px">
				<form method="POST" action="/posts/{{ $post->id }}/comments/{{ Auth::user()->id  }}">
					{{ csrf_field() }}
					<input type="text" id="user" name="userId" value="{{ Auth::user()->id }}" hidden>
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

	@include('layouts.comment-modal')

@endsection

@section ('scripts')
	<script src="{{ asset('js/master.js') }}"></script>
@endsection