@extends('layouts.app')

@section('content')
<div id="page-content">
  <div id='wrap'>
    <div id="page-heading" class="page-bottom">
      <h1>Driver Profile Of <strong>Driver Name: {{$driver->name}}</strong>   </h1>

    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-info">
            <div class="panel-body">
              <form action="{{('../update_driver_report')}}" method="POST" id="wizard" class="form-horizontal">
                {{ csrf_field() }}
                <fieldset title="1">
                  <legend style="display:none">Add New Report</legend>

                  <div class="form-group">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="col-md-12 control-label">Driver Profile Image</label>
                        <div class="col-sm-9">
                          <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
                            </div>
                            <div>
                            <input type="hidden" name="driver_id" value="{{$driver->id}}">
                            <input type="hidden" name="id" value="{{ $reports->id }}">
                              <!-- <span class="btn btn-default btn-file">
                                <span class="fileinput-new">Upload</span>
                                <span class="fileinput-exists">Change</span>
                              </span> -->
                              <!-- <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> -->
                              <!-- <input type="hidden" name="old_file" value="{{ Auth::user()->avatar }}">-->
                            </div>
                          </div>
                          <h3>{{$driver->name}}</h3>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-8">
                      <div class="form-group">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="fieldname" class="col-md-12 control-label">Title *</label>
                            <div class="col-md-12">
                              <input id="fieldname" value="<?= $reports->title; ?>" class="form-control" name="title" minlength="4" type="text" required>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="fieldname" class="col-md-12 control-label">Severity</label>
                            <div class="col-md-12">
                              <input id="fieldname" <?= $reports->severity == 'Low' ? 'checked' : ''; ?> name="severity" value="Low" type="radio" > Low
                              <input id="fieldname" <?= $reports->severity == 'Medium' ? 'checked' : ''; ?> name="severity" value="Medium" type="radio" > Medium
                              <input id="fieldname" <?= $reports->severity == 'High' ? 'checked' : ''; ?> name="severity" value="High" type="radio" > High
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                              <label for="fieldname" class="col-md-12 control-label">What is the issue?</label>
                              <div class="col-md-12">
                                <input id="fieldaddress" <?= in_array('Smoking in vehicle', $issues) ? 'checked' : ''; ?> name="issue[]" value="Smoking in vehicle" type="checkbox" > Smoking in vehicle <br>
                                <input id="fieldaddress" <?= in_array('Offroad with vehicle', $issues) ? 'checked' : ''; ?> name="issue[]" value="Offroad with vehicle" type="checkbox" > Offroad with vehicle <br>
                                <input id="fieldaddress" <?= in_array('Mechanical damage', $issues) ? 'checked' : ''; ?> name="issue[]" value="Mechanical damage" type="checkbox" > Mechanical damage <br>
                                <input id="fieldaddress" <?= in_array('Interior damage', $issues) ? 'checked' : ''; ?> name="issue[]" value="Interior damage" type="checkbox" > Interior damage <br>
                                <input id="fieldaddress" name="issue[]"  <?= in_array('Body damage', $issues) ? 'checked' : ''; ?> value="Body damage" type="checkbox" > Body damage <br>
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="fieldaddress" value="Minor damage" name="issue[]" <?= in_array('Minor damage', $issues) ? 'checked' : ''; ?> type="radio" > Minor damage <br>
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="fieldaddress" value="Major damage" <?= in_array('Major damage', $issues) ? 'checked' : ''; ?> name="issue[]" type="radio" > Major damage <br>
                                <input <?= in_array('UnNotified extension of vehicle', $issues) ? 'checked' : ''; ?> id="fieldaddress" name="issue[]" value="UnNotified extension of vehicle" type="checkbox" > UnNotified extension of vehicle <br>

                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="fieldname" class="col-md-12 control-label">Was there any cost involved for the client?</label>
                              <div class="col-md-12">
                                <input <?= $reports->cost_involved == 'Yes' ? 'checked' : ''; ?> id="fieldemail" type="radio" value="Yes" name="cost_involved" > Yes
                                <input <?= $reports->cost_involved == 'No' ? 'checked' : ''; ?>  id="fieldemail" type="radio" value="No" name="cost_involved" > No
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="fieldname" class="col-md-12 control-label">When did it happen?</label>
                              <div class="col-md-12">
                                <input value="<?= $reports->heppens; ?>" id="fieldemail" class="form-control" type="text" name="heppens"  id="" >
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-6">
                          <div class="form-group">
                            <label for="fieldname" class="col-md-12 control-label">Status</label>
                            <select class="form-control" name="status">
                              <option <?= $reports->status == 1 ? 'selected' : ''; ?> value="1">Active</option>
                              <option <?= $reports->status == 0 ? 'selected' : ''; ?> value="0">Inactive</option>
                            </select>
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
