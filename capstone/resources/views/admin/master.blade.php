@extends ('layouts.dashboard.master')

@section ('content')
	<h2>Pending Approval</h2>
	
		<table class="table table-sm">
		  <thead class="thead-inverse">
		    <tr>
		      <th>#</th>
		      <th>Name</th>
		      <th>Email</th>
		      <th>Phone</th>
		      <th>Institution</th>
		      <th>City</th>
		      <th>Option</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach ($pendings as $pending)
			    <tr>
			      <th scope="row">{{ $pending->id }}</th>
			      <td>{{ $pending->name }}</td>
			      <td>{{ $pending->email }}</td>
			      <td>{{ $pending->phone_number }}</td>
			      <td>{{ $pending->institution }}</td>
			      <td>{{ $pending->city }}</td>
			      <td>
			      	<a class="btn btn-success btn-sm float-left" style="margin-right: 5px;" href="/register/{{ $pending->id }}"><i class="fa fa-check"></i></a>
			      	{{ Form::open(['action' => ['PendingUserController@destroy', $pending->id], 'method' => 'POST', 'class' => 'float-left']) }}
						{{ Form::hidden('_method', 'DELETE') }}
						{{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm']) }}
					{{ Form::close() }}
			      </td>
			    </tr>
		    @endforeach
		  </tbody>
		</table>

	<h2>Users Table</h2>
		<table class="table table-sm">
		  <thead class="thead-inverse">
		    <tr>
		      <th>#</th>
		      <th>Name</th>
		      <th>Email</th>
		      <th>Phone</th>
		      <th>Institution</th>
		      <th>City</th>
		      <th>Option</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach ($users as $user)
			    <tr>
			      <th scope="row">{{ $user->id }}</th>
			      <td>{{ $user->name }}</td>
			      <td>{{ $user->email }}</td>
			      <td>{{ $user->phone_number }}</td>
			      <td>{{ $user->institution }}</td>
			      <td>{{ $user->city }}</td>
			      <td>
			      	<button class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></i></button>
			      	<button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></i></button>
			      </td>
			    </tr>
		    @endforeach
		  </tbody>
		</table>

@endsection