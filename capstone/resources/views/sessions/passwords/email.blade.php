@extends ('layouts.landing.master')

@section ('content')
<div class="wrapper">
    <div class="container-fluid">
        <div class="row bg-white">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="row box">
                    <div class="col-md-12 text-center">
                        <h1>Reset Password</h1>
                        <hr>
                    </div>
                    <div class="row">
                    <div class="col-md-6">

                        <div class="panel panel-default">
                            {{-- <div class="panel-heading">Reset Password</div> --}}

                            <div class="panel-body">
                                @if (session('status'))
                                    <div class="alert alert-success">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                                    {{ csrf_field() }}

                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="email" class=" control-label">E-Mail Address : </label>

                                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-sanz">
                                            Send Password Reset Link
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                Note :
                            </div>
                            <div class="card-body">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus feugiat pretium nisl, in porta dui sodales sed. Vestibulum tristique magna nec neque fermentum, a sagittis nisi semper. Nunc ultrices enim est, eu volutpat purus venenatis eget. Phasellus eget dolor vel mi vulputate efficitur vitae nec eros. Mauris id felis suscipit, pellentesque quam sit amet, tincidunt velit. Sed luctus aliquet odio. Vivamus iaculis, quam ac lacinia cursus, turpis augue fermentum velit, eget ultrices dolor lacus non nunc. Donec ut libero ultricies, malesuada nulla ut, hendrerit ex. Curabitur a dapibus quam. Nunc vel pulvinar nunc. Nunc lobortis maximus tincidunt.
                                </p>
                            </div>
                            <div class="card-footer">
                                
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</div>

@endsection