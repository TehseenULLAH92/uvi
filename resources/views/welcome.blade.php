@extends('layouts.app')

@section('content')
<div class="verticalcenter">
  <div class="col-md-6  col-md-offset-3">
    <div class="panel panel-primary">
      <div class="panel-body">

        <form class="form-horizontal" method="POST" action="{{ route('login') }}" autocomplete="false">
          {{ csrf_field() }}
          <h1 class="text-center">Login</h1>
          <div class="form-group">
            <div class="col-sm-6 col-sm-offset-3{{ $errors->has('email') ? ' has-error' : '' }}">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                <input id="email" type="email" class="form-control" placeholder="Enter Email" name="email" value="{{ old('email') }}" autocomplete="false" required autofocus>

                @if ($errors->has('email'))
                <span class="help-block">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-6 col-sm-offset-3{{ $errors->has('password') ? ' has-error' : '' }}">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input id="password" type="password" placeholder="Enter Password" class="form-control" name="password" autocomplete="false" required>
                @if ($errors->has('password'))
                <span class="help-block">
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
              </div>
            </div>
          </div>
          <div class="clearfix">
            <div class="pull-right"><label><input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me</label></div>
          </div>

          <div class="panel-footer">
            <a href="{{ route('password.request') }}" class="pull-left btn btn-link" style="padding-left:0">Forgot password?</a>

            <div class="pull-right">
              <button type="submit" class="btn btn-primary">Log In</button>
            </div>
          </div>
        </form>

      </div>

    </div>
  </div>
</div>
<style type="text/css" media="screen">
#page-container {
  background: #2c3f47;
  overflow: inherit;
}
footer{display: none;}
</style>
@endsection
