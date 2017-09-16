@extends ('layouts.master')

@section ('content')
	<div class="col-sm-8 blog-main">
		
		<h1>{{ $posts->title }}</h1>
		
		<hr>
		{{ $posts->body }}
		<hr>

		<div class="comments">
			<ul class="list-group">
				@foreach ($posts->comments as $comment)
					<li class="list-group-item">
						<strong>
							{{ $comment->created_at->diffForHumans() }}: &nbsp;
						</strong>
						{{ $comment->body }}
					</li>
				@endforeach
			</ul>
		</div>
		
		<hr>

		<div class="card">
			<div class="card-block">
				<form method="POST" action="/posts/{{ $posts->id }}/comments">
					{{-- {{ method_field('PATCH') }} --}}
					{{ csrf_field() }}

					<div class="form-group">
						<textarea name="body" placeholder="Your comment here." class="form-control" required></textarea>
					</div>

					<div class="form-group">
						<button type="submit" class="btn btn-primary">Add Comment</button>
					</div>

					@include('layouts.errors')

				</form>
			</div>
		</div>

    </div>
@endsection