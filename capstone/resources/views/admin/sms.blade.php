@extends ('layouts.dashboard.master')

@section ('content')

  <header class="page-header">
    <div class="container-fluid">
      <h2 class="no-margin-bottom">Manage SMS</h2>
    </div>
  </header>
  
  @include('layouts.errors')

  <div class="row incon">

  <div class="col-md-12 col-sm-12">
    <ul class="list-group givemesomespace">
        <li class="list-group-item list-group-item-info d-flex justify-content-between align-items-center text-sm">
        Do not abuse this feature!
        <a href="#" id="goodbye"><span class="badge badge-primary"><i class="fa fa-times"></i></span></a>
        </li>
    </ul>
  </div>

  <div class="col-md-5 col-sm-5">
    <div class="card">
      <div class="card-header"></div>
      <div class="container-fluid no-margin">
        <div class="row pad-top">
          <div class="col-md-12 col-sm-12">
            <h2><i class="fa fa-info"></i>&nbsp SMS Feature &nbsp 
            <b class="bg-redder statIcon sms-icon float-right text-center" id="app"
            data-toggle="tooltip" data-placement="left" title="Mobile App Status Indicator">
              <i class="icon fa fa-mobile"></i>
            </b>
            </h2>
            <hr style="margin-bottom: 0px">
          </div>
          <div class="col-md-12 col-sm-12 text-justify" style="padding-top: 10px;">
            <p class="text-xm">This sms feature uses a mobile application for sending txt messages. A cordova app must be present and online. The app requests from the web app's API and then process it for sending. After all messages are sent, the app sends back a report and the web broadcasts it in sms and dashboard pages.</p>
          </div>
        </div> 
      </div>
      <div><hr></div>
    </div>
    {{-- end of card --}}

    <div class="card">
      <a class="none" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
        <div id="toggle-head" class="card-header" data-toggle="tooltip" data-placement="top" title="Click to toggle form.">
          <h2><i class="fa fa-envelope"></i> &nbsp Text Msg Form 
          <i id="toggle-icon" data-id="down" class="fa fa-chevron-right float-right"></i></h2>
        </div>
      </a>
      <div class="card-body collapse" style="padding-bottom: 0px" id="collapseExample">
        <form action="/send/create" method="POST">
            {{ csrf_field() }}
              <div class="form-group">
                <label for="num">Number : </label>
                <input name="num" type="text" placeholder="Ex. 639074239579" class="form-control form-control-sm" required>
              </div>

              <div class="form-group">
                <label for="body">Body Text : </label>
                <textarea name="body" id="body" rows="5" class="form-control form-control-sm" maxlength="130" required>
                </textarea>
              </div>

              <div class="form-group" style="margin-bottom: 0">
               <button type="submit" class="btn btn-primary"> 
                  <i class="fa fa-paper-plane"></i> &nbsp Send
               </button>
              </div>
          </form>
      </div>
      <div><hr></div>
    </div>

  </div>
  {{-- end of col --}}
  
  <div class="col-md-7 col-sm-7">
    <div class="row">
      
      <div class="col-md-12">

        <div class="card">
          <div class="container-fluid no-margin">
            <div class="row pad-top">
              <div class="col-md-12 col-sm-12">
                <h2><i class="fa fa-cart-plus"></i>&nbsp Pending Message &nbsp 
                <i class="fa fa-info-circle text-info" data-toggle="tooltip" data-placement="right" 
                title="Pending messages means the mobile app is not working or connected"></i></h2>
              </div>
            </div> 
          </div>

          <table class="table table-sm pendingTable">
              <thead class="thead-inverse">
                <tr>
                  <th>#</th>
                  <th>Sender</th>
                  <th>Recipient</th>
                  <th>Body</th>
                  <th>Time Sent</th>
                  <th></th>
                </tr>
              </thead>
            <tbody class="pending">
                @if(count($pendings) > 0)
                @foreach ($pendings as $pending)
                  <tr>
                    <th scope="row">{{ $pending->id }}</th>
                    <td>{{ $pending->sender }}</td>
                    <td>{{ $pending->recipient }}</td>
                    <td>{!! substr($pending->body, 0, 10).'...' !!}</td>
                    <td>{{ $pending->created_at->diffForHumans() }}</td>
                    <td>
                      <button class="btn btn-danger deletePending btn-sm" data-id="{{ $pending->id }}">
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
                      <h3>No pending messages</h3>
                    </th>
                  </tr>
                @endif
              </tbody>
          </table>

        </div>
      </div>

      <div class="col-md-4 col-sm-12">
        <div class="card">
          <div class="card-header">
          <h2><i class="fa fa-bullhorn"></i>&nbsp Blast &nbsp
            <button class="btn btn-danger btn-sm float-right editSms" value="{{ $sms[0]->id }}">
            <i class="fa fa-edit"></i></button> 
          </h2>
          </div>
          <div class="container no-margin">
            <div class="row pad-top">
              <div class="col-md-12 col-sm-12 text-center">
                <button class="btn btn-white sendSms" value="{{ $sms[0]->id }}">
                  <i class="fa fa-paper-plane"></i>&nbsp Send
                </button>
                <hr>
              </div>
            </div> 
          </div>
        </div>
      </div>
      <div class="col-md-4 col-sm-12">
        <div class="card">
          <div class="card-header">
            <h2><i class="fa fa-user-secret"></i>&nbsp Admin &nbsp
                <button class="btn btn-info btn-sm float-right editSms" value="{{ $sms[1]->id }}">
                  <i class="fa fa-edit"></i></button> 
            </h2>
          </div>
          <div class="container no-margin">
            <div class="row pad-top">
              <div class="col-md-12 col-sm-12 text-center">
                <button class="btn btn-white sendSms" value="{{ $sms[1]->id }}">
                  <i class="fa fa-paper-plane"></i>&nbsp Send
                </button>
                <hr>
              </div>
            </div> 
          </div>
        </div>  
      </div>
      <div class="col-md-4 col-sm-12">
        <div class="card">
          <div class="card-header">
            <h2><i class="fa fa-users"></i>&nbsp User &nbsp
                <button class="btn btn-success btn-sm float-right editSms" value="{{ $sms[2]->id }}">
                  <i class="fa fa-edit"></i></button> 
            </h2>
          </div>
          <div class="container no-margin">
            <div class="row pad-top">
              <div class="col-md-12 col-sm-12 text-center">
                  <button class="btn btn-white sendSms" value="{{ $sms[2]->id }}">
                    <i class="fa fa-paper-plane"></i>&nbsp Send
                  </button>
                  <hr>
              </div>
            </div> 
          </div>
        </div>
      </div>

    </div>
    {{-- end of row --}}

{{--     <div class="card" id="app">
    
      <div class="container-fluid no-margin">
        <div class="row pad-top">
          <div class="col-md-7 col-sm-7">
            <h2><i class="fa fa-user-plus"></i>&nbsp Custom &nbsp

            </h2>
          </div>
        </div> 
      </div>

      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12 col-sm-12">

          </div>
        </div>
      </div>
    </div> --}}

  </div>
  </div>

  {{-- MODALS --}}

  @component('layouts.dashboard.sm-modal')
    @slot ('id')
      editSms
    @endslot

    @slot ('title')
      <div class="text-info post-user text-lg title">
         
      </div>
    @endslot

    @slot ('modalBody') 
    <form id="smsForm" action="" method="POST">
    <div class="row">
      <div class="col-md-10 offset-md-1">
        <input id="method" type="hidden" name="_method" value="">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
          <textarea id="bodyEdit" type="text" name="body" class="form-control form-control-sm" placeholder="Container Name" maxlength="50"></textarea>
          <p class="msg2send text-sm text-center"></p>
        </div>
      </div>
    </div>

    <div class="text-center">
      <button type="submit" class="btn btn-info btn-block">Update</button>
    </div>
      <hr>
    </form>
    @endslot

    @slot ('modalFooter')
    @endslot
  @endcomponent

  @component ('layouts.dashboard.sm-modal')
    @slot ('id')
      deletePending
    @endslot

    @slot ('title')
      <i class="fa fa-asterisk text-danger"></i> Are you sure?
    @endslot

    @slot ('modalBody') 
      <div class="row">
        <div class="col-md-12 col-sm-12">
          {{ Form::open(['action' => ['SendController@destroy', ''], 'method' => 'POST', 'class' => 'float-left', 'id' => 'pendingDelete']) }}
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
  <script>
    var appStatus = 'not connected';
    var appGreen = setTimeout(function(){
            appStatus = 'notConnected';
          }, 5000);;
  </script>
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="{{ asset('js/master.js') }}"></script>
  <script src="{{ asset('js/admin/sms.js') }}"></script>
@endsection