 @extends ('layouts.landing.master')

 @section ('content')
<div class="wrapper">
    <div class="container-fluid">
        <div class="row bg-white">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="row box">
                    <div class="col-md-12 text-center">
                        <h1>Update Post</h1>
                        <hr>
                    </div>
                    <div class="col-md-12">
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
                                {{ Form::submit('Update', ['class' => 'btn btn-sanz']) }}
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>    
        </div>
    </div>
</div>
	
 @endsection

  @section ('scripts')
     @include ('layouts.ck')
 @endsection