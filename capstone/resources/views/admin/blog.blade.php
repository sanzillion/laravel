

@extends ('layouts.dashboard.master')

@section ('content')

	<header class="page-header">
		<div class="container-fluid">
			<h2 class="no-margin-bottom">Manage Blog Posts</h2>
		</div>
	</header>
	
	@include('layouts.errors')

	<div class="row incon">

	<div class="col-md-12 col-sm-12">
		<div class="card">

			<div class="container-fluid no-margin">
				<div class="row pad-top">
					<div class="col-md-12 col-sm-12">
						<h2><i class="fa fa-check-square-o"></i>&nbsp Pending Approval</h2>
					</div>
				</div> 
			</div>

			<table class="table table-sm pendingTable">
				  <thead class="thead-inverse">
				    <tr>
				      <th>#</th>
				      <th>User</th>
				      <th>Title</th>
				      <th>Body</th>
				      <th>Date</th>
				      <th>Time</th>
				      <th>Options</th>
				    </tr>
				  </thead>
			  <tbody class="pending">
				  	@if(count($pendings) > 0)
				  	@foreach ($pendings as $pending)
					    <tr>
					      <th scope="row">{{ $pending->id }}</th>
					      <td>{{ $pending->user->name }}</td>
					      <td>{!! substr($pending->title, 0, 10).'...' !!}</td>
					      <td>{!! substr($pending->body, 0, 20).'...' !!}</td>
					      <td>{{ $pending->created_at->toFormattedDateString() }}</td>
					      <td>{{ $pending->created_at->toFormattedDateString() }}</td>
					      <td>

							<a class='btn btn-info btn-sm float-left view text-white' 
							style='margin-right: 5px;' data-id='{{ $pending->id }}'>
					      		<i class='fa fa-window-maximize'></i>
					      	</a>

							<a class="btn btn-success btn-sm float-left accept" style="margin-right: 5px;" href="/approve/{{ $pending->id }}">
			                    <i class="fa fa-plus-circle"></i>
		    	            </a>

					      	{{ Form::open(['action' => ['PendingController@destroy', $pending->id], 'method' => 'POST', 'class' => 'float-left']) }}
								{{ Form::hidden('_method', 'DELETE') }}
								{{ Form::button('<i class="fa fa-thumbs-down"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm']) }}
							{{ Form::close() }}

					      </td>
					    </tr>
				    @endforeach
				    @else
				    	<tr>
				    		<th colspan="7"></th>
				    	</tr>
				    	<tr>
				    		<th colspan="7" class="text-center">
				    			<h3>No entry</h3>
				    		</th>
				    	</tr>
				    @endif
				  </tbody>
			</table>

			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12 col-sm-12">
						{{ $pendings->render() }}
					</div>
				</div>
			</div>
		</div>
		{{-- end of card --}}
	</div>
	{{-- end of col --}}
	
	<div class="col-md-12 col-sm-12">
		<div class="card">
		
			<div class="container-fluid no-margin">
				<div class="row pad-top">
					<div class="col-md-6 col-sm-6">
						<h2><i class="fa fa-book"></i>&nbsp Blog Posts &nbsp
							<button type="button" class="btn btn-danger btn-sm deleteAllPosts">
							  <i class="fa fa-exclamation-triangle icon"></i>
							</button>
						</h2>
					</div>
					<div class="col-md-6">
						<div class="form-group float-right">
						  <div class="input-group mb-2 mr-sm-2 mb-sm-0" style="height: 25px;">
						    <div class="input-group-addon"><i class="fa fa-search" style="font-size: 10px;"></i></div>
						    <input type="text" class="form-control form-control-sm searchPost" placeholder="search">
						  </div>
						</div>
					</div>
				</div> 
			</div>

			<table class="table table-sm">
			  <thead class="thead-inverse">
			    <tr>
			      <th>#</th>
			      <th>User</th>
			      <th>Title</th>
			      <th>Body</th>
			      <th>Created</th>
			      <th>Updated</th>
			      <th>Option</th>
			    </tr>
			  </thead>
			  <tbody class="posts">
{{-- 			  @if(count($posts) > 0)
			  	@foreach ($posts as $post)
				    <tr>
				      <th scope="row">{{ $post->id }}</th>
				      <td>{{ $post->user->name }}</td>
				      <td>{{ substr($post->title, 0, 10).'...' }}</td>
				      <td>{!! substr($post->body, 0, 15).'...' !!}</td>
				      <td>{{ $post->created_at->toFormattedDateString() }}</td>
				      <td>{{ $post->updated_at->toFormattedDateString() }}</td>
				      <td>

						<a class='btn btn-info btn-sm float-left viewpost text-white' 
						style='margin-right: 5px;' data-id='{{ $post->id }}'>
				      		<i class='fa fa-window-maximize'></i>
				      	</a>

				      	<a class='btn btn-danger btn-sm float-left deletePost' 
				      	data-id='{{ $post->id }}'><i class='fa fa-trash text-white'></i></a>

				      </td>
				    </tr>
			    @endforeach
			   @else
			   		<tr>
			   			<th colspan="7"></th>
			   		</tr>
			   		<tr>
			   			<th colspan="7" class="text-center"> <h3>No Entry</h3></th>
			   		</tr>
			   @endif --}}
			  </tbody>
			</table>
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12 col-sm-12">
						<button class="btn btn-default btn-sm back">
							<i class="fa fa-backward"></i>&nbsp Previous
						</button>
						<button class="btn btn-default btn-sm for">
							Next &nbsp<i class="fa fa-forward"></i>
						</button>
						{{-- {{ $posts->render() }} --}}
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>

	@component('layouts.dashboard.modal')
		@slot ('id')
			showPost
		@endslot

		@slot ('title')
			<div class="text-info post-user">
				
			</div>
		@endslot

		@slot ('modalBody')	
		<div class="row">
			<div class="col-md-10 offset-md-1">

		        <div class="card">
		        	<h3 class="card-header"></h3>
					  <div class="card-body">
					    <p class="card-text text-justify text-sm">
					    </p>
					  </div>
				</div>

			</div>
		</div>

		<div class="text-center">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		</div>
			
		@endslot

		@slot ('modalFooter')
		@endslot
	@endcomponent

	@component ('layouts.dashboard.sm-modal')
		@slot ('id')
			deletePost
		@endslot

		@slot ('title')
			<i class="fa fa-asterisk text-danger"></i> You are about to delete a blog post. Are you sure?
		@endslot

		@slot ('modalBody')	
			<div class="row">
				<div class="col-md-12 col-sm-12">
					{{ Form::open(['action' => ['PostsController@destroy', ''], 'method' => 'POST', 'class' => 'float-left', 'id' => 'postDelete']) }}
						{{ Form::hidden('_method', 'DELETE') }}
						{{ Form::button('Yes', ['type' => 'submit', 'class' => 'btn btn-danger']) }}
						<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
					{{ Form::close() }}
				</div>
			</div>
	      	
		@endslot

		@slot ('modalFooter')
		@endslot
	@endcomponent
	
	@component('layouts.dashboard.modal')
		@slot ('id')
			deleteAllPosts
		@endslot

		@slot ('title')
			<i class="fa fa-asterisk text-danger"></i> Proceed with caution!
			Do you want to delete ALL Posts? Are you sure?
		@endslot

		@slot ('modalBody')	
		<div class="row">
				<div class="col-md-12 col-sm-12">
					<form action="/blog/deleteAll" method="POST">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<button class="btn btn-danger" type="submit">Yes</button>
						<button type="button" class="btn btn-secondary no" data-dismiss="modal">No</button>
					</form>
					{{-- {{ Form::open(['action' => ['UserController@destruction', ''], 'method' => 'POST']) }} --}}
						{{-- {{ Form::button('Yes', ['type' => 'submit', 'class' => 'btn btn-danger']) }} --}}
					{{-- {{ Form::close() }} --}}
				</div>
			</div>
		@endslot

		@slot ('modalFooter')
		@endslot
	@endcomponent


@endsection

@section ('scripts')
	<script src="{{ asset('js/master.js') }}"></script>
	<script src="{{ asset('js/admin/blog.js') }}"></script>
@endsection