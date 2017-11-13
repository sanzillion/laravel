@extends ('layouts.dashboard.master')

@section ('content')

  <header class="page-header">
    <div class="container-fluid">
      <h2 class="no-margin-bottom">Manage Custom SMS</h2>
    </div>
  </header>
  
  @include('layouts.errors')

  <div class="row incon">

{{--   <div class="col-md-12 col-sm-12">
    <ul class="list-group givemesomespace">
        <li class="list-group-item list-group-item-info d-flex justify-content-between align-items-center text-sm">
        Do not abuse this feature!
        <a href="#" id="goodbye"><span class="badge badge-primary"><i class="fa fa-times"></i></span></a>
        </li>
    </ul>
  </div> --}}

  <div class="col-md-5 col-sm-5">
    <div class="card">
      <div class="card-header">
          <h2><i class="fa fa-cog"></i>&nbsp {{ $sms->recipient }} &nbsp 
            <button class="btn btn-danger btn-sm float-right text-center deleteCustom" data-id="{{ $sms->id }}"
            data-toggle="tooltip" data-placement="left" title="Caution: Delete this current Custom Sms">
              <i class="icon fa fa-trash"></i>
            </button>
          </h2>
      </div>
      <div class="container-fluid no-margin">
        <div class="row pad-top">
         
          <div class="col-md-12 col-sm-12">
            <button class="btn btn-sm btn-success margin-bot" id="addRecipients">
            <i class="fa fa-plus-circle"></i> Add recipients</button>
            <button class="btn btn-sm btn-warning margin-bot" id="addFromUsers">
            <i class="fa fa-user-plus"></i>  Add from users</button>
            <hr>
          </div>

          <div class="col-md-12">
            <form action="/sms/{{ $sms->id }}/update" method="POST">
                <input id="method" type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="form-group">
                    <label for="bodyEdit">Message Body :</label>
                    <textarea id="bodyEdit" type="text" name="body" class="form-control form-control-sm" placeholder="Container Name" maxlength="50">{{ $sms->body }}</textarea>
                  </div>

                <div class="text-center">
                <button type="submit" class="btn btn-info btn-block">Update</button>
               </div>
            </form>
          </div>

          <div class="col-md-2">
            
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
                <h2><i class="fa fa-compass"></i>&nbsp Recipients &nbsp </h2>
              </div>
            </div> 
          </div>

          <table class="table table-sm pendingTable">
              <thead class="thead-inverse">
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Number</th>
                  <th>Created</th>
                  <th>Option</th>
                  <th></th>
                </tr>
              </thead>
            <tbody class="pending">
                @if(count($customs) > 0)
                @foreach ($customs as $custom)
                  <tr>
                    <th scope="row">{{ $custom->id }}</th>
                    <td>{{ $custom->name }}</td>
                    <td>{{ $custom->phone_number }}</td>
                    <td>{{ $custom->created_at->diffForHumans() }}</td>
                    <td>
                      <button class="btn btn-success deletePending btn-sm" data-id="{{ $custom->id }}">
                      <i class="fa fa-edit"></i></button>
                      <button class="btn btn-danger deletePending btn-sm" data-id="{{ $custom->id }}">
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
                      <h3>No recipients</h3>
                    </th>
                  </tr>
                @endif
              </tbody>
          </table>

          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12 col-sm-12">
                {{ $customs->render() }}
              </div>
            </div>
          </div>

        </div>
      </div>

  </div>
  </div>

  {{-- MODALS --}}

  @component ('layouts.dashboard.sm-modal')
    @slot ('id')
      deleteCustom
    @endslot

    @slot ('title')
      <i class="fa fa-asterisk text-danger"></i> Are you sure?
    @endslot

    @slot ('modalBody') 
      <div class="row">
        <div class="col-md-12 col-sm-12">
          {{ Form::open(['action' => ['CustomController@destroy', ''], 'method' => 'POST', 'class' => 'float-left', 'id' => 'customDelete']) }}
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
      addrecipient
    @endslot

    @slot ('title')
      <i class="fa fa-plus-circle"></i> Add recipients
    @endslot

    @slot ('modalBody') 
      <div class="row">
        <div class="col-md-12 col-sm-12">
          <form action="/sms/recipient" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="recipient" value="{{ $sms->recipient }}">
            
            <div class="form-group">
              <div class="row appendhere">
                <div class="col-5">
                  <input type="text" class="form-control form-control-sm margin-bot" 
                  name="name[]" placeholder="Name" required="" maxlength="10">
                </div>
                <div class="col-7">
                  <input type="text" class="form-control form-control-sm margin-bot" 
                  name="phone[]" placeholder="Phone Number" required="" maxlength="12">
                </div>
              </div>
            </div>
            <div class="form-group no-margin-bottom">
              <button type="submit" class="btn btn-info btn-block">Submit</button>
            </div>
          </form>
        </div>
        <div class="col-12">
          <a href="#" class="text-sm float-right another"><i class="fa fa-plus"></i> Add another input field</a>
        </div>
      </div>
          
    @endslot

  @endcomponent

  @component ('layouts.dashboard.modal')
    @slot ('id')
      addFromUserz
    @endslot

    @slot ('title')
      <i class="fa fa-users text-info"></i> Add From User
    @endslot

    @slot ('modalBody') 
      <div class="row">
        <div class="col-md-10 offset-md-1 col-sm-12">
          <form class="usersForm" action="/custom/populate" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="recipient" value="{{ $sms->recipient }}">
            <table class="table table-sm table-sanz">
              <thead class="thead-inverse">
                <tr>
                  <th></th>
                  <th>Name</th>
                  <th>Phone Number</th>
                </tr>
              </thead>
              <tbody class="fromusers">
              @foreach($users as $user)
                <tr>
                  <td class="text-center">
                    <label class="custom-control custom-checkbox chk">
                      <input id="chkbx" type="checkbox" class="custom-control-input" 
                        name="user[]" value="{{ $user->name }}" data-id="{{ $user->id }}">
                      <span class="custom-control-indicator"></span>
                    </label></td>
                  <td>{{ $user->name }}</td>
                  <td><input id="{{ $user->id }}" type="hidden" name="num[]" class="hiddenNum" 
                  value="{{ $user->phone_number }}" disabled> {{ $user->phone_number }} </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          <div class="form-group pad-left">
            <label class="custom-control custom-checkbox">
              <input type="checkbox" id="chkall" class="custom-control-input">
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">Check all</span>
            </label>
            <button class="btn btn-info float-right" type="submit">Submit</button>
          </div>
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
  <script src="{{ asset('js/admin/sms.js') }}"></script>
@endsection