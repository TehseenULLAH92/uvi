@extends('layouts.app')

@section('content')
<div id="page-content">
  <div id='wrap'>
    <div id="page-heading" class="page-bottom">
      <h1>Update Profile</h1>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-info">
            <div class="panel-body">
              <form action="{{ ('updateProfile') }}" method="POST" id="wizard" class="form-horizontal">
                {{ csrf_field() }}
                <fieldset title="1">
                  <legend>Update Profile</legend>
                  <h1>@include('flash::message')</h1>
                  <div class="form-group">
                    <div class="col-md-12">
                      <div class="form-group">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="fieldname" class="col-md-12 control-label">Name</label>
                            <div class="col-md-12">
                              <input id="fieldname" class="form-control" name="name" value="{{$name}}" type="text" required>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="fieldname" class="col-md-12 control-label">First Name</label>
                            <div class="col-md-12">
                              <input id="fieldname" class="form-control" name="firstname" value="{{$firstname}}" type="text" required>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="fieldname" class="col-md-12 control-label">Last Name</label>
                            <div class="col-md-12">
                              <input id="fieldname" class="form-control" name="lastname" value="{{$lastname}}" type="text" required>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="fieldname" class="col-md-12 control-label">Email</label>
                            <div class="col-md-12">
                              <input id="fieldname" class="form-control" name="email" value="{{$email}}" type="text" required>
                            </div>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
                </fieldset>
                <input type="submit" class="finish btn-success btn" value="Submit" />
              </form>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- container -->
  </div> <!--wrap -->
</div> <!-- page-content -->
@endsection
