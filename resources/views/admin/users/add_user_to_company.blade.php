@extends('layouts.app')

@section('content')
<div id="page-content">
  <div id='wrap'>
    <div id="page-heading" class="page-bottom">
      <h1>Add New User</h1>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-info">
            <div class="panel-body">
             <form action="{{('../add_user_to_company/'.$company->id)}}" method="POST" id="wizard" class="form-horizontal">
                  {{ csrf_field() }}
                  <fieldset title="1">
                    <legend>General</legend>
                    <div class="form-group">
                      <div class="col-md-12">
                        <div class="form-group">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="fieldname" class="col-md-12 control-label">Name*</label>
                              <div class="col-md-12">
                                <input id="fieldname" class="form-control" name="name" minlength="4" type="text" required>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="fieldname" class="col-md-12 control-label">First Name*</label>
                              <div class="col-md-12">
                                <input id="fieldname" class="form-control" name="firstname" minlength="4" type="text" required>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                              <div class="form-group">
                                <label for="fieldname" class="col-md-12 control-label">Last Name*</label>
                                <div class="col-md-12">
                                  <input id="fieldaddress" class="form-control" name="lastname" minlength="4" type="text" required>
                                </div>
                              </div>
                            </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="fieldname" class="col-md-12 control-label">Email Address*</label>
                              <div class="col-md-12">
                                <input id="fieldemail" class="form-control" type="email" name="email" required>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="fieldname" class="col-md-12 control-label">User Level*</label>
                              <div class="col-md-12">
                                <select id="e11" style="width:100%" name="role" class="form-control populate1" required>
                                  <option value="">Please Select Level</option>
                                  <option value="crcompanies">Car Rental Companies</option>
                                  <option value="incompanies">Insurance Companies</option>
                                  <option value="cremployees">Car Rental Employees</option>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="fieldname" class="col-md-12 control-label">Company</label>
                              <div class="col-md-12">
                                <select id="e1" style="width:100%" name="company_id" class="populate" required>
                                  <option value="">Please Select A Company</option>
                                  <?php foreach ($companies as $key => $companies): ?>
                                    <option value="{{$companies->id}}" <?php
                                    if($companies->id == $companies->id){
                                       echo "selected='Selected'";
                                     }else {
                                       echo "";
                                     } ?>>{{$companies->name}}</option>
                                  <?php endforeach; ?>
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>

                      </div>
                    </div>
                  </fieldset>
                  <fieldset title="2">
                    <legend>Password</legend>
                    <div class="form-group">
                      <div class="col-md-12">
                        <div class="form-group">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="fieldname" class="col-md-12 control-label">Password</label>
                              <div class="col-md-12">
                                <input id="fieldfirstname" type="password" class="form-control" name="password" minlength="4" type="text" required>
                              </div>
                            </div>
                          </div>

                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="fieldname" class="col-md-12 control-label">Confirm Password</label>
                              <div class="col-md-12">
                                <input id="fieldphone" type="password" class="form-control" name="password_confirmation" minlength="4" type="text" required>
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
