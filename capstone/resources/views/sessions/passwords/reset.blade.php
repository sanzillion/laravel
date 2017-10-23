@extends('layouts.landing.master')

@section('content')
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
                        @include ('layouts.errors')
                        <div class="panel-body">
                            <form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
                                {{ csrf_field() }}

                                <input type="hidden" name="token" value="{{ $token }}">

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-8 control-label">E-Mail Address</label>

                                    <div class="col-md-10">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="col-md-8 control-label">Password</label>

                                    <div class="col-md-10">
                                        <input id="password" type="password" class="form-control" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                    <label for="password-confirm" class="col-md-8 control-label">Confirm Password</label>
                                    <div class="col-md-10">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                        @if ($errors->has('password_confirmation'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-sanz">
                                            Reset Password
                                        </button>
                                    </div>
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
                            <div class="card-body text-justify">
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
