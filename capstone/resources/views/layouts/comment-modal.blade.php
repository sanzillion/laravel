

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Comment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{ Form::open(['action' => ['CommentsController@update', ''], 'method' => 'POST', 'class' => 'float-right', 'id' => 'commentForm']) }}
			{{ Form::hidden('_method', 'PUT') }}
			{{ Form::text('PostId', '', ['id' => 'Pid', 'hidden']) }}
			{{ Form::textarea('body', '', ['id' => 'body', 'class' => 'form-control', 'placeholder' => 'Body Text']) }}			
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        	{{ Form::submit('Save Changes', ['class' => 'btn btn-primary']) }}
		{{ Form::close() }}
      </div>
    </div>
  </div>
</div>