 @extends ('layouts.master')

 @section ('content')

	<h2>Create Post</h2>

	<hr>
{{-- 	<form method="POST" action="/posts">
	{{ csrf_field() }}

	  <div class="form-group">
	    <label for="title">Title:</label>
	    <input type="text" class="form-control" id="title" name="title">
	  </div>
	  <div class="form-group">
	    <label for="body">Body</label>
	    <textarea type="text" class="form-control" id="body" name="body"></textarea>
	  </div>
 		<div class="form-group">
	  		<button type="submit" class="btn btn-primary">Publish</button>
 		</div>
		
		@include ('layouts.errors')

	</form> --}} 
	@include ('layouts.errors')
	{!! Form::open(['method' => 'POST', 'route' => 'post']) !!}
		{{ Form::hidden('id', auth()->user()->id) }}
    	<div class="form-group">
    		{{ Form::label('title', 'Title') }}
    		{{ Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title']) }}
    	</div>
    	<div class="form-group">
    		{{ Form::label('body', 'Body') }}
    		{{ Form::textarea('body', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text']) }}
    	</div>
    	<div class="form-group">
    		{{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
    	</div>
	{!! Form::close() !!}

	
 @endsection

 @section ('scripts')
	 @include ('layouts.ck')
 @endsection