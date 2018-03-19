@extends('layouts.app')

@section('content')
<div id="page-content">
  <div id='wrap'>
    <div id="page-heading" class="page-bottom">
      <h1>Update Company Details</h1>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-info">
            <div class="panel-body">
              <form role="form" action="{{ url('admin/drivers/update/'.$driver->id) }}" method="POST" id="wizard" class="form-horizontal">
                {{ csrf_field() }}
                <fieldset title="1">
                  <legend style="display:none">Add New Driver</legend>
                  <div class="form-group">
                    <div class="col-md-12">
                      <div class="form-group">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="fieldname" class="col-md-12 control-label">First Name*</label>
                            <div class="col-md-12">
                              <input id="fieldname" class="form-control" name="fname" value="{{$driver->fname}}" minlength="4" type="text" required>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="fieldname" class="col-md-12 control-label">Last Name*</label>
                            <div class="col-md-12">
                              <input id="fieldname" class="form-control" value="{{$driver->lname}}" name="lname" minlength="4" type="text" required>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="fieldname" class="col-md-12 control-label">Driver License</label>
                            <div class="col-md-12">
                              <input id="fieldname" class="form-control" value="{{$driver->license}}" name="license" minlength="4" type="text" required>
                            </div>
                          </div>
                        </div>
                        <!-- <div class="col-md-4">
                          <div class="form-group">
                            <label for="fieldname" class="col-md-12 control-label">Email*</label>
                            <div class="col-md-12">
                              <input id="fieldname" class="form-control" name="email" value="{{$driver->email}}"type="text" required>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                              <label for="fieldname" class="col-md-12 control-label">Phone Number*</label>
                              <div class="col-md-12">
                                <input id="fieldaddress" class="form-control" name="phonenumber" value="{{$driver->phonenumber}}" type="text" required>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="fieldname" class="col-md-12 control-label">Address</label>
                              <div class="col-md-12">
                                <input id="fieldemail" class="form-control" type="text" value="{{$driver->address}}" name="address" >
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="fieldname" class="col-md-12 control-label">Joining Date</label>
                              <div class="col-md-12">
                                <input id="fieldemail" class="form-control" type="text" value="{{$driver->joiningdate}}" name="joiningdate"  id="datepicker1" >
                              </div>
                            </div>
                          </div>-->
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
