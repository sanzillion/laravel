@extends ('layouts.dashboard.master')

@section ('content')

	<header class="page-header">
		<div class="container-fluid">
			<h2 class="no-margin-bottom">Superuser Dashboard</h2>
		</div>
	</header>

	@include('layouts.errors')

	<div class="row incon">

		<div class="col-md-4 col-sm-4">
			<div class="card">

				<div class="card-header"></div>
				<div class="container-fluid no-margin">
					<div class="row pad-top">
						<h2 style="padding-left: 15px;"><i class="fa fa-rocket"></i>&nbsp Master Controls &nbsp</h2>
						<div class="col-md-12"><hr style="margin-top: 0px"></div>
						
						<div class="col-md-12">
							<h1>
							<button class="btn btn-warning btn-sm forceLogOut">Force out</button> &nbsp 
							<i class="fa fa-info-circle text-xsm" data-toggle="tooltip"
        						data-placement="right" title="Force Log out all users/admins"></i>
							</h1>
							
						</div>
					</div>
				</div>

			</div>
		</div>

		<div class="col-md-8 col-sm-8">
			<div class="card">

				<div class="container-fluid no-margin">
					<div class="row pad-top">
						<div class="col-md-6">
							<h2><i class="fa fa-tasks"></i>&nbsp Activity Logs &nbsp
								{{-- <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#createAdmin">
								  <i class="fa fa-plus-circle"></i>&nbsp New Admin
								</button> --}}
								<button type="button" class="btn btn-danger btn-sm deleteAllLogs">
								  <i class="fa fa-exclamation-triangle icon"></i>
								</button>
							</h2>
						</div>
						<div class="col-md-6">
							<div class="form-group float-right">
							  <div class="input-group mb-2 mr-sm-2 mb-sm-0" style="height: 25px;">
							    <div class="input-group-addon"><i class="fa fa-search" style="font-size: 10px;"></i></div>
							    <input type="text" class="form-control form-control-sm searchlogs" placeholder="quick search">
							  </div>
							</div>
						</div>
					</div>
				</div>
			
			<table class="table table-sm adminTable">
			  <thead class="thead-inverse">
			    <tr>
			      <th class="text-center">#</th>
			      <th>User</th>
			      <th>Type</th>
			      <th>Action</th>
			      <th>Description</th>
			      <th>Stamp</th>
			    </tr>
			  </thead>
			  <tbody class="tbody-logs">
				{{-- activity.js  --}}
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
					</div>
				</div>
			</div>

			</div>	
		</div>

		<div class="col-md-12 col-sm-12">
			<div class="card">

				<div class="container-fluid no-margin">
					<div class="row pad-top">
						<div class="col-md-6">
							<h2><i class="fa fa-table"></i>&nbsp Manage Admin &nbsp
								<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#createAdmin">
								  <i class="fa fa-plus-circle"></i>&nbsp New Admin
								</button>
								<button type="button" class="btn btn-danger btn-sm deleteAllAdmin">
								  <i class="fa fa-exclamation-triangle icon"></i>
								</button>
							</h2>
						</div>
						<div class="col-md-6">
							<div class="form-group float-right">
							  <div class="input-group mb-2 mr-sm-2 mb-sm-0" style="height: 25px;">
							    <div class="input-group-addon"><i class="fa fa-search" style="font-size: 10px;"></i></div>
							    <input type="text" class="form-control form-control-sm search" placeholder="search">
							  </div>
							</div>
						</div>
					</div>
				</div>
			
			<table class="table table-sm adminTable">
			  <thead class="thead-inverse">
			    <tr>
			      <th class="text-center">#</th>
			      <th>Name</th>
			      <th>Email</th>
			      <th>Phone</th>
			      <th>Option</th>
			    </tr>
			  </thead>
			  <tbody class="tbody-admin">
			  @if(count($admins) > 0)
			  	@foreach ($admins as $admin)
				    <tr>
				      <th scope="row" class="text-center">{{ $admin->id }}</th>
				      <td>{{ $admin->name }}</td>
				      <td>{{ $admin->email }}</td>
				      <td>{{ $admin->phone_number }}</td>
				      <td>
				      	<a class="btn btn-primary btn-sm float-left editAdmin" style="margin-right: 5px; color: white;" data-id="{{ $admin->id }}"><i class="fa fa-book"></i></a>
						<a class="btn btn-danger btn-sm float-left deleteAdmin" data-id="{{ $admin->id }}"><i class="fa fa-trash text-white"></i></a>
				      </td>
				    </tr>
			    @endforeach
			   @else
				   	<tr>
				   		<th colspan="5"></th>	
				   	</tr>
				   	<tr>
				   		<th colspan="5" class="text-center"> <h3>No Entry</h3> </th>
				   	</tr>
			   @endif
			  </tbody>
			</table>
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12 col-sm-12">
						{{ $admins->render() }}
					</div>
				</div>
			</div>

			</div>	
		</div>

	</div>

	@component('layouts.dashboard.modal')
		@slot ('id')
			editAdminModal
		@endslot

		@slot ('title')
			<i class="fa fa-pencil"></i> &nbsp Update Admin
		@endslot

		@slot ('modalBody')	
			<div class="row">
			<div class="col-md-8 offset-md-2">
		        {{ Form::open(['action' => ['AdminController@update', ''], 'method' => 'POST', 'id' => 'adminForm']) }}
		  			{{ Form::hidden('_method', 'PUT') }}

		        <div class="form-group row">
		          <label for="name" class="col-2 col-form-label">Name:</label>
		          <div class="col-10">
		  			   {{ Form::text('name', '', ['id' => 'name', 'class' => 'form-control form-control-sm']) }}
		          </div>
		        </div>

		        <div class="form-group row">
		          <label for="email" class="col-2 col-form-label">Email:</label>
		          <div class="col-10">
		            {{ Form::text('email', '', ['id' => 'email', 'class' => 'form-control form-control-sm']) }}  
		          </div>
		        </div>

		        <div class="form-group row">
		          <label for="phone" class="col-2 col-form-label">Phone:</label>
		          <div class="col-10">
		            {{ Form::text('phone_number', '', ['id' => 'phone', 'class' => 'form-control form-control-sm']) }}
		          </div>
		        </div>

	        </div>
			</div>
		@endslot

		@slot ('modalFooter')
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						{{ Form::submit('Save Changes', ['class' => 'btn btn-primary btn-block']) }}
						{{ Form::close() }}
					</div>
				</div>
			</div>
		@endslot
	@endcomponent

	@component('layouts.dashboard.modal')
		@slot ('id')
			createAdmin
		@endslot

		@slot ('title')
			<div class="text-info text-lg">
				<i class="fa fa-user-circle-o"></i>&nbsp Create Admin
			</div>
		@endslot

		@slot ('modalBody')	
		<div class="row">
			<div class="col-md-10 offset-md-1">

	        {{ Form::open(['action' => ['AdminController@create', ''], 'method' => 'POST', 'id' => 'adminForm']) }}

			<div class="form-group">
			  <div class="input-group mb-2 mr-sm-2 mb-sm-0">
			    <div class="input-group-addon"><i class="fa fa-id-badge"></i></div>
			    {{ Form::text('name', '', ['id'=>'name', 'class'=>'form-control form-control-sm', 'placeholder'=>"Name ex. Sanz Moses"]) }}
			  </div>
			</div>

			<div class="form-group">
			  <div class="input-group mb-2 mr-sm-2 mb-sm-0">
			    <div class="input-group-addon"><i class="fa fa-paper-plane"></i></i></div>
			    {{ Form::text('email', '', ['id'=>'email', 'class'=>'form-control form-control-sm', 'placeholder'=>"Email ex. Sanz@example.com"]) }}
			  </div>
			</div>

			<div class="form-group">
			  <div class="input-group mb-2 mr-sm-2 mb-sm-0">
			    <div class="input-group-addon"><i class="fa fa-phone"></i></div>
			    {{ Form::text('phone_number', '', ['id'=>'phone_number', 'class'=>'form-control form-control-sm', 'placeholder'=>"Phone number ex. 639074239571"]) }}
			  </div>
			</div>
			
			<div class="card bg-dark">
				<div class="card-body">
					<div class="form-group">
					  <div class="input-group mb-2 mr-sm-2 mb-sm-0">
					    <div class="input-group-addon"><i class="fa fa-lock"></i></div>
					    {{ Form::password('password', ['id'=>'password', 'class'=>'form-control form-control-sm', 'placeholder'=>"Password, minimum of 6 characters", 'type'=>'password']) }}
					  </div>
					</div>

					<div class="form-group">
					  <div class="input-group mb-2 mr-sm-2 mb-sm-0">
					    <div class="input-group-addon"><i class="fa fa-key"></i></div>
					    {{ Form::password('password_confirmation', ['id'=>'password_confirmation', 'class'=>'form-control form-control-sm', 'placeholder'=>"Password Confirmation"]) }}
					  </div>
					</div>
				</div>
			</div>

			</div>
		</div>
		@endslot

		@slot ('modalFooter')
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						{{ Form::submit('Create', ['class' => 'btn btn-info btn-block']) }}
						{{ Form::close() }}
					</div>
				</div>
			</div>
		@endslot
	@endcomponent
	
	@component ('layouts.dashboard.sm-modal')
		@slot ('id')
			deleteAdmin
		@endslot

		@slot ('title')
			<i class="fa fa-asterisk text-danger"></i> You are about to delete an Admin. Are you sure?
		@endslot

		@slot ('modalBody')	
			<div class="row">
				<div class="col-md-12 col-sm-12">
					{{ Form::open(['action' => ['AdminController@destroy', ''], 'method' => 'POST', 'id'=>'deleteForm']) }}
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

	@component ('layouts.dashboard.sm-modal')
		@slot ('id')
			deleteAllAdmin
		@endslot

		@slot ('title')
			<i class="fa fa-asterisk text-danger"></i> Proceed with caution!
			Do you want to delete ALL administrators? Are you sure?
		@endslot

		@slot ('modalBody')	
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<form action="/master/delete" method="POST">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<button class="btn btn-danger" type="submit">Yes</button>
						<button type="button" class="btn btn-secondary no" data-dismiss="modal">No</button>
					</form>
				</div>
			</div>
	      	
		@endslot

		@slot ('modalFooter')
		@endslot
	@endcomponent

	@component ('layouts.dashboard.sm-modal')
		@slot ('id')
			deleteAllLogs
		@endslot

		@slot ('title')
			<i class="fa fa-asterisk text-danger"></i> Proceed with caution!
			Do you want to delete ALL Log entries? Are you sure?
		@endslot

		@slot ('modalBody')	
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<form action="/activity/deleteAll" method="POST">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<button class="btn btn-danger" type="submit">Yes</button>
						<button type="button" class="btn btn-secondary no" data-dismiss="modal">No</button>
					</form>
				</div>
			</div>
	      	
		@endslot

		@slot ('modalFooter')
		@endslot
	@endcomponent

	@component ('layouts.dashboard.sm-modal')
		@slot ('id')
			forceLogOut
		@endslot

		@slot ('title')
			<i class="fa fa-asterisk text-danger"></i> Proceed with caution!
			Log out all users and admins? Are you sure?
		@endslot

		@slot ('modalBody')	
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<form action="/activity/forceOut" method="POST">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<button class="btn btn-danger" type="submit">Yes</button>
						<button type="button" class="btn btn-secondary no" data-dismiss="modal">No</button>
					</form>
				</div>
			</div>
	      	
		@endslot

		@slot ('modalFooter')
		@endslot
	@endcomponent


@endsection

@section ('scripts')
	<script src="{{ asset('js/master.js') }}"></script>
	<script src="{{ asset('js/admin/activity.js') }}"></script>
@endsection