@extends ('layouts.landing.master')


@section ('content')
<div class="wrapper">
    <div class="container-fluid">
        <div class="row bg-white">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="row showpostbox">
	                <div class="col-md-8">
	                	<div class="card">
	                		<div class="card-header title">
	                			<h1>{{ $post->title }}</h1>

								<p class="blog-post-meta"><i><strong>{{ $post->user->name }}</i> </strong> <i class="blurr">on {{ $post->created_at->toFormattedDateString()  }}</i></p>
	                		</div>
	                		<div class="card-body">
	                			<div class="text-justify">{!! $post->body !!}</div>
	                		</div>
	                		<div class="card-footer">
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
								<div class="container-fluid">
									<div class="row">
										<div class="col-md-12">
											{{ Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-right']) }}
												{{ Form::hidden('_method', 'DELETE') }}
												{{ Form::submit('Delete', ['class' => 'btn btn-sm btn-deletepost']) }}
											{{ Form::close() }}

											<div class="float-left">
												<a href="/posts/{{ $post->id }}/edit" class="btn btn-sm btn-edit" style="margin-right: 10px;">Edit</a>
											</div>
										</div>
									</div>
								</div>
								@endif
								@endif

								<br>

								<div class="comments">
								<ul class="list-group">
								@foreach ($post->comments as $comment)
									<li class="list-group-item">
										<div class="col-md-12 no-padding">
											<p>
											<strong>
											{{ $comment->user->name }}&nbsp 
											</strong>
											{{ $comment->created_at->diffForHumans() }}:
											<br>
											{{ $comment->body }}</p>
										</div>
										<div class="col-md-12">
											@if(Auth::check())
												@if(Auth::user()->id == $comment->user->id)
												<a href="#" class="float-right deleteComment" data-id="{{ $comment->id }}">Delete</a>
												<a data-toggle="modal" style="margin-right: 10px" data-id="{{ $comment->id }}" 
												title="edit" class="float-right editComment">Edit</a>
												@endif
											@endif
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
												<textarea class="form-control commentsection" name="body" id="comment" placeholder="Your comment here" required></textarea>
											</div>

											<div class="form-group">
												<button class="btn btn-sanz" type="submit">Add Comment</button>
											</div>
										</form>

										@include ('layouts.errors')
									</div>
								</div>
								@endif	

								@include('layouts.comment-modal')
	                		</div>
	                	</div>
	                </div>
	                <div class="col-md-4">
	                	@include ('layouts.sidebar')
	                </div>
 				</div>
        	</div>
        	<div class="col-md-2"></div>  	
    	</div>
	</div>
</div>

@component ('layouts.dashboard.sm-modal')
	@slot ('id')
		deleteComment
	@endslot

	@slot ('title')
		<i class="fa fa-asterisk text-danger"></i> Are you sure?
	@endslot

	@slot ('modalBody')	
		<div class="row">
			<div class="col-md-2 col-sm-1"></div>
			<div class="col-md-8 col-sm-10">
				{{ Form::open(['action' => ['CommentsController@destroy', ''], 'method' => 'POST', 'class' => 'float-left', 'id' => 'commentDelete']) }}
					{{ Form::hidden('_method', 'DELETE') }}
					{{ Form::button('Yes', ['type' => 'submit', 'class' => 'btn btn-sanz']) }}
					<button type="button" class="btn btn-edit" data-dismiss="modal">No</button>
				{{ Form::close() }}
			</div>
			<div class="col-md-2 col-sm-1"></div>
		</div>
	@endslot

	@slot ('modalFooter')
	@endslot
@endcomponent

@endsection

@section ('scripts')
	<script src="{{ asset('js/guest.js') }}"></script>
@endsection