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
              <form role="form" enctype="multipart/form-data" action="{{ url('admin/companies/update/'.$companies->id) }}" method="POST" id="wizard" class="form-horizontal">
                {{ csrf_field() }}
                <fieldset title="1">
                  <legend>General</legend>
                  <div class="form-group">
                    <div class="col-md-8">
                      <div class="form-group">
                        <div class="col-md-6">
                          <label for="fieldname" class="col-md-12 control-label">Company Type*</label>
                          <div class="col-md-12">
                            <select id="e1" name="type" style="width:100%" class="populate">
                              <option value="">Select Type</option>
                              <option value="CR"
                              <?php if($companies->type == "CR")
                                {
                                  echo "selected";
                                }
                                ?>>Car Rental</option>
                              <option value="IN"
                              <?php
                              if($companies->type == "IN"){
                                 echo "selected";
                               }
                               ?>>Insurance Company</option>
                            </select>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <label for="fieldname" class="col-md-12 control-label">Phone Number*</label>
                          <div class="col-md-12">
                            <input id="fieldphone" class="form-control" name="phonenumber" value="{{$companies->phonenumber}}" type="text" required>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-6">
                          <label for="fieldname" class="col-md-12 control-label">Company Name*</label>
                          <div class="col-md-12">
                            <input id="fieldname" class="form-control" name="name" value="{{$companies->name}}" type="text" required>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <label for="fieldname" class="col-md-12 control-label">Email Address*</label>
                          <div class="col-md-12">
                            <input id="fieldemail" class="form-control" type="email" value="{{$companies->email}}" name="email" required>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-6">
                          <label for="fieldname" class="col-md-12 control-label">Company Address*</label>
                          <div class="col-md-12">
                            <input id="fieldaddress" class="form-control" value="{{$companies->address}}" name="address" type="text" required>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <label for="fieldname" class="col-md-12 control-label">Website</label>
                          <div class="col-md-12">
                            <input id="fieldurl" class="form-control" value="{{$companies->website}}" type="text" name="website">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="col-md-12 control-label">Image Upload Widgets</label>
                        <div class="col-sm-9">
                          <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"><img src="{{ URL::asset('uploads/company/'.$companies->image) }}" class="img-responsive pic-bordered" alt=""></div>
                            <div>
                              <span class="btn btn-default btn-file"><span class="fileinput-new">Upload</span><span class="fileinput-exists">Change</span><input type="file" name="image"></span>
                              <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                            </div>
                          </div>
                          <input type="hidden" name="old_file" value="{{ $companies->image }}">
                        </div>
                      </div>
                    </div>
                  </div>
                </fieldset>
                <fieldset title="2">
                  <legend>Contact Person</legend>
                  <div class="form-group">
                    <div class="col-md-8">
                      <div class="form-group">
                        <div class="col-md-6">
                          <label for="fieldname" class="col-md-12 control-label">First Name</label>
                          <div class="col-md-12">
                            <input id="fieldfirstname" class="form-control" name="personfname" value="{{$companies->personfname}}" type="text" required>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <label for="fieldname" class="col-md-12 control-label">Phone Number</label>
                          <div class="col-md-12">
                            <input id="fieldphone" class="form-control" name="personphone" value="{{$companies->personphone}}" type="text" required>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-6">
                          <label for="fieldname" class="col-md-12 control-label">Last Name</label>
                          <div class="col-md-12">
                            <input id="fieldlastname" class="form-control" name="personlname" value="{{$companies->personlname}}" type="text" required>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <label for="fieldname" class="col-md-12 control-label">Email Address</label>
                          <div class="col-md-12">
                            <input id="fieldemail" class="form-control" type="email" value="{{$companies->personemail}}" name="personemail" required>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </fieldset>
                <fieldset title="3">
                  <legend>Membership</legend>
                  <div class="form-group">
                    <div class="col-md-8">
                      <div class="form-group">
                        <div class="col-md-6">
                          <label for="fieldname" class="col-md-12 control-label">Type of membership</label>
                          <div class="col-md-12">
                            <select id="e2" style="width:100%" name="membership" class="populate">
                              <option value="">Select Membership</option>
                              <option value="monthly"
                              <?php if($companies->membership == "monthly")
                                {
                                  echo "selected";
                                }
                                ?>>Monthly</option>
                              <option value="yearly"
                              <?php if($companies->membership == "yearly")
                                {
                                  echo "selected";
                                }
                                ?>>Yearly</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-6">
                          <label for="fieldname" class="col-md-12 control-label">Start Date</label>
                          <div class="col-md-12">
                            <input type="text" class="form-control" value="{{$companies->startdate}}" name="startdate" id="datepicker1">
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-md-6">
                          <label for="fieldname" class="col-md-12 control-label">End Date</label>
                          <div class="col-md-12">
                            <input type="text" class="form-control" value="{{$companies->enddate}}" name="enddate" id="datepicker2">
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
