@extends ('layouts.dashboard.master')

@section ('content')

  <header class="page-header">
    <div class="container-fluid">
      <h2 class="no-margin-bottom">My Account</h2>
    </div>
  </header>
  
  @include('layouts.errors')

  <div class="row incon">

  <div class="col-md-5 col-sm-5">
    <div class="card">
      <div class="card-header"></div>
      <div class="container-fluid no-margin">
        <div class="row pad-top">
          <div class="col-md-12 col-sm-12">
            <h2><i class="fa fa-id-card-o"></i>&nbsp Admin id: #{{ $admin->id }} &nbsp 
            </h2>
          </div>
          <div class="col-md-12 col-sm-12 text-justify pad-top">

            <table class="table table-sm table-responsive">
              <tbody>
                <tr>
                  <th scope="row">Name:</th>
                  <td width="60%">{{ $admin->name }}</td>
                </tr>
                <tr>
                  <th scope="row">Email:</th>
                  <td>{{ $admin->email }}</td>
                </tr>
                <tr>
                  <th scope="row">Phone Number:</th>
                  <td>{{ $admin->phone_number }}</td>
                </tr>
                <tr>
                  <th scope="row">Access Level:</th>
                  <td>{{ $admin->level }}</td>
                </tr>
              </tbody>
            </table>

            <p class="text-sm">
            <a class="btn btn-info btn-xsm margin-bot editAcc" href="#" data-id="{{ $admin->id }}">Edit Account</a>
            <a class="btn btn-success btn-xsm margin-bot editPass" href="#" data-id="{{ $admin->id }}">Change Password</a></p>
          </div>
        </div> 
      </div>
      <div><hr></div>
    </div>
    {{-- end of card --}}

  </div>
  {{-- end of col --}}
  
  <div class="col-md-7 col-sm-7">
    <div class="row">
      
      <div class="col-md-12">

        <div class="card">
          <div class="container-fluid no-margin">
            <div class="row pad-top">
              <div class="col-md-12 col-sm-12">
                <h2><i class="fa fa-envelope-open"></i>&nbsp Messages</h2>
              </div>
            </div> 
          </div>

          <table class="table table-sm msgTable">
              <thead class="thead-inverse">
                <tr>
                  <th>#</th>
                  <th>Sender</th>
                  <th>Email</th>
                  <th>Body</th>
                  <th>Time Sent</th>
                  <th></th>
                </tr>
              </thead>
            <tbody>
                @if(count($msgs) > 0)
                  @foreach ($msgs as $msg)
                    <tr>
                      <th scope="row">{{ $msg->id }}</th>
                      <td>{{ $msg->from }}</td>
                      <td>{{ $msg->email }}</td>
                      <td>{!! substr($msg->msg, 0, 20).'...' !!}</td>
                      <td>{{ $msg->created_at->diffForHumans() }}</td>
                      <td>
                        <button class="btn btn-info viewmsg btn-sm" data-id="{{ $msg->id }}">
                        <i class="fa fa-eye-slash"></i></button>
                        <button class="btn btn-danger deletemsg btn-sm" data-id="{{ $msg->id }}">
                        <i class="fa fa-trash"></i></button>
                      </td>
                    </tr>
                  @endforeach
                @else
                  <tr>
                    <th colspan="7"></th>
                  </tr>
                  <tr>
                    <th colspan="7" class="text-center">
                      <h3>No messages</h3>
                    </th>
                  </tr>
                @endif
              </tbody>
          </table>

        </div>
      </div>

    </div>
    {{-- end of row --}}
  </div>
  </div>

  {{-- MODALS --}}

  @component('layouts.dashboard.modal')
    @slot ('id')
      editAcc
    @endslot

    @slot ('title')
      <div class="text-info post-user text-lg title"><i class="fa fa-address-book"></i> &nbsp My Account</div>
    @endslot

    @slot ('modalBody') 
    <div class="row">
      <div class="col-md-10 offset-md-1">

      {{ Form::open(['action' => ['AdminController@create', ''], 'method' => 'POST', 'id' => 'accountForm']) }}
      {{ Form::hidden('_method', 'PUT') }}
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
      
      </div>
    </div>
    @endslot

    @slot ('modalFooter')
      <div class="container">
        <div class="text-center row">
          <div class="col-md-12">
              {{ Form::submit('Update', ['class' => 'btn btn-info btn-block']) }}
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
      <div class="text-info post-user text-lg title"><i class="fa fa-address-book"></i> &nbsp My Account</div>
    @endslot

    @slot ('modalBody') 
    <div class="row">
      <div class="col-md-10 offset-md-1">

      {{ Form::open(['action' => ['AdminController@create', ''], 'method' => 'POST', 'id' => 'passForm']) }}

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
    </div>
    @endslot

    @slot ('modalFooter')
      <div class="container">
        <div class="text-center row">
          <div class="col-md-12">
              {{ Form::submit('Update', ['class' => 'btn btn-info btn-block']) }}
            {{ Form::close() }}
          </div>
        </div>
      </div>
    @endslot
  @endcomponent  

  @component('layouts.dashboard.modal')
    @slot ('id')
      viewmsg
    @endslot

    @slot ('title')
      <div class="text-info post-user text-lg title"><i class="fa fa-address-book"></i> &nbsp Messge</div>
    @endslot

    @slot ('modalBody') 
    <div class="row">
      <div class="col-md-10 offset-md-1">
        <div class="card">
          <div class="card-header">
            <p class="text-sm no-margin-bottom">
              <i class="name"></i> &nbsp -
              <i class="phone"></i>
              <br>
              <i class="email"></i>
            </p>
          </div>
          <div class="card-body text-justify">
          <label for="msg">Message:</label>
            <p id="msg" class="msg text-sm"></p>
          </div>
        </div>
      </div>
    </div>
    @endslot

    @slot ('modalFooter')
      <div class="container">
        <div class="text-center row">
          <div class="col-md-12">
              <button type="button" class="btn btn-info btn-block" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    @endslot
  @endcomponent


  @component ('layouts.dashboard.sm-modal')
    @slot ('id')
      deletemsg
    @endslot

    @slot ('title')
      <i class="fa fa-asterisk text-danger"></i> Are you sure?
    @endslot

    @slot ('modalBody') 
      <div class="row">
        <div class="col-md-12 col-sm-12">
          {{ Form::open(['action' => ['SendController@destroy', ''], 'method' => 'POST', 'class' => 'float-left', 'id' => 'msgDelete']) }}
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
  <script src="{{ asset('js/admin/acc.js') }}"></script>
@endsection