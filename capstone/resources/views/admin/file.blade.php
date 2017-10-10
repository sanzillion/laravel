@extends ('layouts.dashboard.master')

@section ('content')

  <header class="page-header">
    <div class="container-fluid">
      <h2 class="no-margin-bottom">Manage Files and Containers</h2>
    </div>
  </header>
  
  @include('layouts.errors')

  <div class="row incon">

  <div class="col-md-6 col-sm-6">
    <div class="card">

      <div class="container-fluid no-margin">
        <div class="row pad-top">
          <div class="col-md-12 col-sm-12">
            <h2><i class="fa fa-archive"></i>&nbsp Manage Containers &nbsp
              <button type="button" class="btn btn-success btn-sm newContainer">
                <i class="fa fa-plus icon"></i>&nbsp New Container
              </button>
              <button type="button" disabled class="btn btn-danger btn-sm deleteFolder">
                <i class="fa fa-exclamation-triangle icon"></i> 
              </button>
            </h2>
          </div>
        </div> 
      </div>

      <div class="container-fluid no-margin">
        <div class="row pad-top folder-container">
            {{-- here goes folder table --}}
        </div>

        <div class="row pad-top">
          <div class="col-md-12 text-center">
            <h5 class="text-md pagination-folder">
              <a><i class="fa fa-angle-double-left p-left"></i></a>
              <span class="num">
              </span>
              <a><i class="fa fa-angle-double-right p-right"></i></a>
            </h5>
          </div>
        </div>

      </div>
    </div>
    {{-- end of card --}}
  </div>
  {{-- end of col --}}
  
  <div class="col-md-6 col-sm-6">
    <div class="card">
    
      <div class="container-fluid no-margin">
        <div class="row pad-top">
          <div class="col-md-7 col-sm-7">
            <h2><i class="fa fa-book"></i>&nbsp Files &nbsp
              <button type="button" class="btn btn-success btn-sm uploadfile">
                <i class="fa fa-upload icon"></i>&nbsp Upload
              </button>
              <button type="button" class="btn btn-danger btn-sm deleteFiles">
                <i class="fa fa-exclamation-triangle icon"></i> 
              </button>
            </h2>
          </div>
          <div class="col-md-5">
            <div class="form-group float-right">
              <div class="input-group mb-2 mr-sm-2 mb-sm-0" style="height: 25px;">
                <div class="input-group-addon"><i class="fa fa-search" style="font-size: 10px;"></i></div>
                <input type="text" class="form-control form-control-sm searchFiles" placeholder="search">
              </div>
            </div>
          </div>
        </div> 
      </div>

      <table class="table table-sm">
        <thead class="thead-inverse">
          <tr>
            <th>#</th>
            <th>Uploader</th>
            <th>Filename</th>
            <th>Type</th>
            <th>Option</th>
          </tr>
        </thead>
        <tbody class="files">
            {{-- here goes file table --}}
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

  {{-- MODALS --}}

  @component('layouts.dashboard.sm-modal')
    @slot ('id')
      newContainer
    @endslot

    @slot ('title')
      <div class="text-info post-user text-lg">
         <i class="fa fa-plus-square"></i> &nbsp Add Container
      </div>
    @endslot

    @slot ('modalBody') 
    <form action="/folder/create" method="POST">
    <div class="row">
      <div class="col-md-10 offset-md-1">

        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
          <input type="text" name="name" class="form-control form-control-sm" placeholder="Container Name">
        </div>

      </div>
    </div>

    <div class="text-center">
      <button type="submit" class="btn btn-info">Save</button>
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>

    </form>
    @endslot

    @slot ('modalFooter')
    @endslot
  @endcomponent

  @component('layouts.dashboard.modal')
    @slot ('id')
      uploadFile
    @endslot

    @slot ('title')
      <div class="text-info post-user">
        <i class="fa fa-cloud-upload"></i> &nbsp File Upload
      </div>
    @endslot

    @slot ('modalBody') 
    <form action="/file/create" method="POST" enctype="multipart/form-data" id="upload">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="row">
        <div class="col-md-10 offset-md-1">
          <div class="row">
          <div class="col-md-6">
            <input type="file" name="file[]" multiple="true" class="form-control form-control-sm">
          </div>

          <div class="col-md-6">
            <select name="folders" id="folders" class="custom-select folders">
              
            </select>
          </div>
          </div>
        </div>
      </div>

      <div class="text-center pad-top">
        <button type="submit" class="btn btn-info">Upload</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>

    </form>
    @endslot

    @slot ('modalFooter')
    @endslot
  @endcomponent

  @component('layouts.dashboard.modal')
    @slot ('id')
      viewFile
    @endslot

    @slot ('title')
      <div class="text-info post-user">
        <i class="fa fa-eye-slash"></i> &nbsp File Upload
      </div>
    @endslot

    @slot ('modalBody') 
    <form action="/file/create" method="POST" enctype="multipart/form-data" id="update">
      <input name="_method" type="hidden" value="PUT">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">

      <div class="row">
        <div class="col-md-10 offset-md-1">

        <div class="card">
        <img class="card-img-top img-fluid" id="filepic" src="">
        <div class="card-body">
          <h4 class="card-title"></h4>
          <h3 class="uploader"></h3>
          <p id="filename" class="card-text">
                
          </p>
          <select name="folders" id="vfolders" class="custom-select vfolders">
          </select>
        </div>
        </div>

        </div>
      </div>

      <div class="text-center pad-top">
        <button type="submit" class="btn btn-info">Update</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>

    </form>
    @endslot

    @slot ('modalFooter')
    @endslot
  @endcomponent

  @component('layouts.dashboard.sm-modal')
    @slot ('id')
      deleteFolder
    @endslot

    @slot ('title')
      <i class="fa fa-asterisk text-danger"></i> Proceed with caution!
      Do you want to delete ALL Folders? Are you sure?
    @endslot

    @slot ('modalBody') 
    <div class="row">
        <div class="col-md-12 col-sm-12">
          <form action="/folder/deleteAll" method="POST">
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

  @component ('layouts.dashboard.sm-modal')
    @slot ('id')
      deleteFile
    @endslot

    @slot ('title')
      <i class="fa fa-asterisk text-danger"></i> You are about to delete a file. Are you sure?
    @endslot

    @slot ('modalBody') 
      <div class="row">
        <div class="col-md-12 col-sm-12">
          {{ Form::open(['action' => ['FileController@destroy', ''], 'method' => 'POST', 'class' => 'float-left', 'id' => 'fileDelete']) }}
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
      deleteFiles
    @endslot

    @slot ('title')
      <i class="fa fa-asterisk text-danger"></i> You are about to delete ALL files. Are you sure?
    @endslot

    @slot ('modalBody') 
      <div class="row">
        <div class="col-md-12 col-sm-12">
          <form action="/files/all" method="POST">
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
  <script src="{{ asset('js/admin/file.js') }}"></script>
@endsection