@extends('layouts.app')

@section('content')
<div id="page-content">
  <div id='wrap'>
    <div id="page-heading" class="page-bottom">
      <h1>Update Account</h1>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-info">
            <div class="panel-body">
              <form action="{{ ('updatePassword') }}" method="POST" id="wizard" class="form-horizontal">
                {{ csrf_field() }}
                <fieldset title="1">
                  <legend>Update Password</legend>
                  <h1>@include('flash::message')</h1>
                  <div class="form-group">
                    <div class="col-md-12">
                      <div class="form-group">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="fieldname" class="col-md-12 control-label">Current Password*</label>
                            <div class="col-md-12">
                              <input id="fieldname" class="form-control" name="current_password" type="password" required>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="fieldname" class="col-md-12 control-label">New Password*</label>
                            <div class="col-md-12">
                              <input id="fieldname" class="form-control" name="new_password" type="password" required>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="fieldname" class="col-md-12 control-label">Confirm New Password*</label>
                            <div class="col-md-12">
                              <input id="fieldname" class="form-control" name="confirm_new_password" type="password" required>
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
