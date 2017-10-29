 @extends ('layouts.landing.master')

 @section ('content')
<div class="wrapper">
    <div class="container-fluid">
        <div class="row bg-white">
            <div class="col-md-2"></div>
            <div class="col-md-3">
                <div class="margin-v card">
                	<div class="card-header">
                		My account
                	</div>
                	<div class="card-body text-sm">
			            <table class="table table-sm"
			            	style="overflow: auto">
			              <thead>
			              	<tr>
			              		<th scope="row">ID</th>
			              		<th>{{ $user->id }}</th>
			              	</tr>
			              </thead>
			              <tbody>
			                <tr>
			                  <th scope="row">Name:</th>
			                  <td width="70%">{{ $user->name }}</td>
			                </tr>
			                <tr>
			                  <th scope="row">Email:</th>
			                  <td>{{ $user->email }}</td>
			                </tr>
			                <tr>
			                  <th scope="row">Phone:</th>
			                  <td>{{ $user->phone_number }}</td>
			                </tr>
			                <tr>
			                  <th scope="row">Org:</th>
			                  <td>{{ $user->institution }}</td>
			                </tr>
			                <tr>
			                  <th scope="row">City:</th>
			                  <td>{{ $user->city }}</td>
			                </tr>
			                <tr>
			                  <th scope="row">
			                  </th>
			                  <td>
			                  </td>
			                </tr>
			              </tbody>
			            </table>
			            <p class="text-sm">
							<a class="btn btn-sanz btn-xsm margin-bot editAcc" href="#" data-id="{{ $user->id }}">
			            	<i class="fa fa-user-circle-o"></i> Update Acc</a>
		                  	<a class="btn btn-sanz btn-xsm margin-bot editPass" href="#" data-id="{{ $user->id }}">
		                    <i class="fa fa-lock"></i> Password</a>
			            </p>
                	</div>
                	<div class="card-footer"></div>
                </div>
        	</div>
        	<div class="col-md-5">

	            @if($posts->count() < 1)
	                <div class="blog-post card margin-v">
	                    <div class="card-header title">
	                        No posts yet.
	                    </div>
	                    <div class="card-body">
	                        Nothing to show.
	                    </div>
	                    <div class="card-footer">
	                    </div>
	                </div>
	            @else
	            	<div class="blog-post card margin-v">
						<div class="card-body">My Own Posts</div>
	            	</div>
		            @foreach($posts as $post) 

		                <div class="blog-post card margin-v">
		                    <div class="card-header title">
		                        <a href="/posts/{{  $post->id }}">
		                            <h3 class="blog-post-title">{{ $post->title }}</h3>
		                        </a>
		                        <i class="blog-post-meta">
		                        <i class="blurr"><i class="fa fa-calendar"></i> {{ $post->created_at->toFormattedDateString()  }} 
		                        by &nbsp </i> {{ $post->user->name }}</i>
		                    </div>
		                    <div class="card-footer comfoot">
		                        @if($post->comments->count() > 0)
		                            <i class="blurr">{{ $post->comments->count() }} comment/s</i>
		                        @else
		                            <i class="blurr">No comments yet</i>
		                        @endif
		                    </div>
		                </div><!-- /.blog-post -->

		            @endforeach
				@endif	
	            @if(method_exists($posts, 'render'))
	                {{ $posts->render() }}
	            @endif

        	</div>
        	<div class="col-md-2"></div>  	
    	</div>
	</div>
</div>
	
{{-- MODALS --}}
@component('layouts.dashboard.modal')
    @slot ('id')
      editAcc
    @endslot

    @slot ('title')
      <div class="text-info post-user text-lg title"><i class="fa fa-address-book"></i> &nbsp Update Account</div>
    @endslot

    @slot ('modalBody') 
    <div class="row">
	 <div class="col-md-1"></div>
      <div class="col-md-10">

      {{ Form::open(['action' => ['AccountController@update', $user->id], 'method' => 'POST', 'id' => 'accountForm']) }}
      {{ Form::hidden('_method', 'PUT') }}
      <div class="form-group">
        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
          <div class="input-group-addon"><i class="fa fa-user-circle"></i></div>
          {{ Form::text('name', $user->name, ['id'=>'name', 'class'=>'form-control form-control-sm', 'placeholder'=>"Name ex. Sanz Moses"]) }}
        </div>
      </div>

      <div class="form-group">
        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
          <div class="input-group-addon"><i class="fa fa-envelope-open-o"></i></i></div>
          {{ Form::text('email', $user->email, ['id'=>'email', 'class'=>'form-control form-control-sm', 'placeholder'=>"Email ex. Sanz@example.com"]) }}
        </div>
      </div>

      <div class="form-group">
        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
          <div class="input-group-addon"><i class="fa fa-phone-square"></i></div>
          {{ Form::text('phone_number', $user->phone_number, ['id'=>'phone_number', 'class'=>'form-control form-control-sm', 'placeholder'=>"Phone number ex. 639074239571"]) }}
        </div>
      </div>      

      <div class="form-group">
        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
          <div class="input-group-addon"><i class="fa fa-university"></i></div>
          {{ Form::text('institution', $user->institution, ['id'=>'institution', 'class'=>'form-control form-control-sm', 'placeholder'=>"SJPIICD"]) }}
        </div>
      </div>

      <div class="form-group">
        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
          <div class="input-group-addon"><i class="fa fa-globe"></i></div>
          {{ Form::text('city', $user->city, ['id'=>'city', 'class'=>'form-control form-control-sm', 'placeholder'=>"Davao"]) }}
        </div>
      </div>
      
      </div>
      <div class="col-md-1"></div>
    </div>
    @endslot

    @slot ('modalFooter')
      <div class="container">
        <div class="text-center row">
          <div class="col-md-12">
              {{ Form::submit('Update', ['class' => 'btn btn-sanz btn-block']) }}
            {{ Form::close() }}
          </div>
        </div>
      </div>
    @endslot
  @endcomponent  

  @component('layouts.dashboard.modal')
    @slot ('id')
      editPass
    @endslot

    @slot ('title')
      <div class="text-info post-user text-lg title"><i class="fa fa-unlock"></i> &nbsp Change Passowrd</div>
    @endslot

    @slot ('modalBody') 
    <div class="row">
    	<div class="col-md-1"></div>
		<div class="col-md-10 offset-md-1">

		{{ Form::open(['action' => ['AccountController@store', $user->id], 'method' => 'POST', 'id' => 'passForm']) }}

		  <div class="form-group">
		    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
		      <div class="input-group-addon"><i class="fa fa-unlock-alt"></i></div>
		      {{ Form::password('Old password', ['id'=>'password', 'class'=>'form-control form-control-sm', 'placeholder'=>"Old Password", 'type'=>'password', 'required']) }}
		    </div>
		  </div>

		  <div class="form-group">
		    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
		      <div class="input-group-addon"><i class="fa fa-lock"></i></div>
		      {{ Form::password('password', ['id'=>'password', 'class'=>'form-control form-control-sm', 'placeholder'=>"New Password, minimum of 6 characters", 'type'=>'password', 'required']) }}
		    </div>
		  </div>

		  <div class="form-group">
		    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
		      <div class="input-group-addon"><i class="fa fa-key"></i></div>
		      {{ Form::password('password_confirmation', ['id'=>'password_confirmation', 'class'=>'form-control form-control-sm', 'placeholder'=>"Password Confirmation", "required"]) }}
		    </div>
		  </div>

		</div>
		<div class="col-md-1"></div>
    </div>
    @endslot

    @slot ('modalFooter')
      <div class="container">
        <div class="text-center row">
          <div class="col-md-12">
              {{ Form::submit('Update', ['class' => 'btn btn-sanz btn-block']) }}
            {{ Form::close() }}
          </div>
        </div>
      </div>
    @endslot
  @endcomponent  



 @endsection

 @section ('scripts')
 @endsection