@extends('master')
@section('content')
<div class="container">

  @if (Session::has('errors'))
  <div class="alert alert-danger login-message alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span>
      <span class="sr-only">Close</span>
    </button>
    <strong class="glyph">{{ $errors->first() }}</strong>
  </div>
  @endif

  @if (Session::has('message'))
  <div class="alert alert-success login-message alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span>
      <span class="sr-only">Close</span>
    </button>
    <strong class="glyph">{{ Session::get('message') }}</strong>
  </div>
  @endif  

  <div class="text-center">
    <br><br>
    <p class="lead">Please enter in your login details</p> 
  </div>

  <div class="login-box">
      <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">

          <div class="form-group">
              <label class="col-md-4 control-label">E-Mail Address</label>
              <div class="col-md-6">
                  <input type="email" class="form-control" name="email" value="{{ old('email') }}">
              </div>
          </div>

          <div class="form-group">
              <label class="col-md-4 control-label">Password</label>
              <div class="col-md-6">
                  <input type="password" class="form-control" name="password">
              </div>
          </div>

          <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                  <div class="checkbox">
                      <label>
                          <input type="checkbox" name="remember"> Remember Me
                      </label>
                  </div>
              </div>
          </div>

          <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                  <button type="submit" class="btn btn-primary">Login</button>

                  <a class="btn btn-link" href="{{ url('/password/email') }}">Forgot Your Password?</a>
              </div>
          </div>
      </form>
  </div> <!-- /login box -->
  
</div>
@stop 



