 @extends ('layouts.master')

 @section ('content')

	<h2>Create Post</h2>

	<hr>
	@include ('layouts.errors')
	{!! Form::open(['method' => 'POST', 'action' => ['PostsController@update', $post->id]]) !!}
    	<div class="form-group">
    		{{ Form::label('title', 'Title') }}
    		{{ Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Title']) }}
    	</div>
    	<div class="form-group">
    		{{ Form::label('body', 'Body') }}
    		{{ Form::textarea('body', $post->body, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text']) }}
    	</div>
    	<div class="form-group">
    		{{ Form::hidden('_method', 'PUT') }}
    		{{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
    	</div>
	{!! Form::close() !!}
	
 @endsection

  @section ('scripts')
     @include ('layouts.ck')
 @endsection