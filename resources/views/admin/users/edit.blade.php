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

            <form action="{{('../update_user')}}" method="POST" id="wizard" class="form-horizontal">
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
                            <input id="fieldname" value="{{ $user->name }}" class="form-control" name="name" minlength="4" type="text" required>
                          </div>
                        </div>
                      </div>
                      <input type="hidden" value="{{ $user->id }}" name="id">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="fieldname" class="col-md-12 control-label">First Name*</label>
                          <div class="col-md-12">
                            <input id="fieldname" value="{{ $user->firstname }}" class="form-control" name="firstname" minlength="4" type="text" required>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                            <label for="fieldname" class="col-md-12 control-label">Last Name*</label>
                            <div class="col-md-12">
                              <input id="fieldaddress"  value="{{ $user->lastname }}" class="form-control" name="lastname" minlength="4" type="text" required>
                            </div>
                          </div>
                        </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="fieldname" class="col-md-12 control-label">Email Address*</label>
                          <div class="col-md-12">
                            <input id="fieldemail" class="form-control"  value="{{ $user->email }}" type="email" name="email" required>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="fieldname" class="col-md-12 control-label">User Level*</label>
                          <div class="col-md-12">
                            <select id="e11" style="width:100%" name="role" class="form-control populate1" required>
                              <option value="">Please Select Level</option>
                              <option <?= $user->role == 'admin' ? 'selected' : ''; ?> value="admin">Admin</option>
                              <option <?= $user->role == 'crcompanies' ? 'selected' : ''; ?> value="crcompanies">Car Rental Companies</option>
                              <option <?= $user->role == 'incompanies' ? 'selected' : ''; ?> value="incompanies">Insurance Companies</option>
                              <option <?= $user->role == 'cremployees' ? 'selected' : ''; ?> value="cremployees">Car Rental Employees</option>
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
                              <?php foreach ($companies as $key => $companies): 
                                    if ($companies->id == $user->company_id) :
                              ?>
                               <option selected value="{{$companies->id}}" >{{$companies->name}}</option>
                             <?php else : ?>
                                <option value="{{$companies->id}}" >{{$companies->name}}</option>
                              <?php endif; endforeach; ?>
                            </select>
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
