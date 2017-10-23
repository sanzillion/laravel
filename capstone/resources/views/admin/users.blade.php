@extends ('layouts.dashboard.master')

@section ('content')

  <header class="page-header">
    <div class="container-fluid">
      <h2 class="no-margin-bottom"><a href="/admin" style="color: white">General Admin Dashboard</a> / 
      <b style="font-size: .8em !important;">Manage Users</b></h2>
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
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Institution</th>
              <th>City</th>
              <th>Options</th>
            </tr>
          </thead>
        <tbody>
            @if(count($pendings) > 0)
            @foreach ($pendings as $pending)
              <tr>
                <th scope="row">{{ $pending->id }}</th>
                <td>{{ $pending->name }}</td>
                <td>{{ $pending->email }}</td>
                <td>{{ $pending->phone_number }}</td>
                <td>{{ $pending->institution }}</td>
                <td>{{ $pending->city }}</td>
                <td>

                  <a class="btn btn-success btn-sm float-left accept" style="margin-right: 5px;" href="/register/{{ $pending->id }}">
                    <i class="fa fa-thumbs-up"></i>
                  </a>

                  {{ Form::open(['action' => ['PendingUserController@destroy', $pending->id], 'method' => 'POST', 'class' => 'float-left']) }}
                {{ Form::hidden('_method', 'DELETE') }}
                {{ Form::button('<i class="fa fa-times"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm']) }}
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
    </div>

    <div class="col-md-12 col-sm-12">
      <div class="card">

        <div class="container-fluid no-margin">
          <div class="row pad-top">
            <div class="col-md-6">
              <h2><i class="fa fa-users"></i>&nbsp Manage Users &nbsp
                @if(auth()->user()->isMaster())
                  <button type="button" class="btn btn-danger btn-sm deleteAllUser">
                    <i class="fa fa-exclamation-triangle icon"></i>
                  </button>
                @endif
              </h2>
            </div>
            <div class="col-md-6">
              <div class="form-group float-right">
                <div class="input-group mb-2 mr-sm-2 mb-sm-0" style="height: 25px;">
                  <div class="input-group-addon"><i class="fa fa-search" style="font-size: 10px;"></i></div>
                  <input type="text" class="form-control form-control-sm searchUser" placeholder="search">
                </div>
              </div>
            </div>
          </div>
        </div>
      
      <table class="table table-sm userTable">
        <thead class="thead-inverse">
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Institution</th>
            <th>City</th>
            <th>Options</th>
          </tr>
        </thead>
        <tbody class="tbody user">
        {{-- @if(count($users) > 0)
          @foreach ($users as $user)
            <tr>
              <th scope="row">{{ $user->id }}</th>
              <td id="name">{{ $user->name }}</td>
              <td id="email">{{ $user->email }}</td>
              <td id="phone">{{ $user->phone_number }}</td>
              <td id="insti">{{ $user->institution }}</td>
              <td id="user">{{ $user->city }}</td>
              <td>

                <button class="btn btn-primary btn-sm float-left editUser"
                style="margin-right: 5px;" data-id="{{ $user->id }}">
                  <i class="fa fa-edit"></i></i>
                </button>

                <a class="btn btn-danger btn-sm float-left deleteUser" data-id="{{ $user->id }}"><i class="fa fa-trash text-white"></i></a>

              </td>
            </tr>
          @endforeach
         @else
            <tr>
              <th colspan="7"></th> 
            </tr>
            <tr>
              <th colspan="7" class="text-center"> <h3>No Entry</h3> </th>
            </tr>
         @endif --}}
        </tbody>
      </table>
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12 col-sm-12 text-center">
            <button class="btn btn-default btn-sm back">
              <i class="fa fa-backward"></i>&nbsp Previous
            </button>
            <button class="btn btn-default btn-sm for">
              Next &nbsp<i class="fa fa-forward"></i>
            </button>
            {{-- {{ $users->render() }} --}}
          </div>
        </div>
      </div>

      </div>  
    </div>

  </div>

  @component('layouts.dashboard.modal')
    @slot ('id')
      editUserModal
    @endslot

    @slot ('title')
      <div class="text-info text-lg">
        <i class="fa fa-pencil-square-o"></i>&nbsp Update User
      </div>
    @endslot

    @slot ('modalBody') 
    <div class="row">
      <div class="col-md-10 offset-md-1">

          {{ Form::open(['action' => ['UserController@update', ''], 'method' => 'POST', 'id' => 'adminForm']) }}
          {{ Form::hidden('_method', 'PATCH') }}

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

          <div class="form-group row">
            <label for="institution" class="col-2 col-form-label">Org:</label>
            <div class="col-10">
              {{ Form::text('institution', '', ['id' => 'institution', 'class' => 'form-control form-control-sm']) }}
            </div>
          </div>   

          <div class="form-group row">
            <label for="city" class="col-2 col-form-label">City:</label>
            <div class="col-10">
              {{ Form::text('city', '', ['id' => 'city', 'class' => 'form-control form-control-sm']) }}
            </div>
          </div>   

      </div>
    </div>
    @endslot

    @slot ('modalFooter')
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          {{ Form::submit('Save Changes', ['class' => 'btn btn-info']) }}
          {{ Form::close() }}
    @endslot
  @endcomponent
  
  @component ('layouts.dashboard.sm-modal')
    @slot ('id')
      deleteAllUser
    @endslot

    @slot ('title')
      <i class="fa fa-asterisk text-danger"></i> Proceed with caution!
      Do you want to delete ALL Users? Are you sure?
    @endslot

    @slot ('modalBody') 
      <div class="row">
        <div class="col-md-12 col-sm-12">
          <form action="/user/delete" method="POST">
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
      deleteUser
    @endslot

    @slot ('title')
      <i class="fa fa-asterisk text-danger"></i> You are about to delete an User. Are you sure?
    @endslot

    @slot ('modalBody') 
      <div class="row">
        <div class="col-md-12 col-sm-12">
          {{ Form::open(['action' => ['UserController@destroy', ''], 'method' => 'POST', 'class' => 'float-left', 'id' => 'userDelete']) }}
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



@endsection

@section ('scripts')

  <script src="{{ asset('js/master.js') }}"></script>
  <script src="{{ asset('js/admin/admin.js') }}"></script>

@endsection