@extends('layouts.app')

@section('content')
<div id="page-content">
  <div id='wrap'>
    <div id="page-heading" class="page-bottom">
      <h1>Driver Profile Of <?php if (Auth::user()): ?>{{ Auth::user()->name }}<?php endif; ?></h1>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-info">
            <div class="panel-body">
              <form action="{{ ('../add_new_report') }}" method="POST" id="wizard" class="form-horizontal">
                {{ csrf_field() }}
                <fieldset title="1">
                  <legend style="display:none">Add New Report</legend>
                  <div class="form-group">
                    <div class="col-md-12">
                      <div class="form-group">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="fieldname" class="col-md-12 control-label">Title *</label>
                            <div class="col-md-12">
                              <input id="fieldname" class="form-control" name="title" minlength="4" type="text" required>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="fieldname" class="col-md-12 control-label">Severity</label>
                            <div class="col-md-12">
                              <input id="fieldname" name="severity" type="radio" > Low
                              <input id="fieldname" name="severity" type="radio" > Medium
                              <input id="fieldname" name="severity" type="radio" > High
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                              <label for="fieldname" class="col-md-12 control-label">What is the issue?</label>
                              <div class="col-md-12">
                                <input id="fieldaddress" class="form-control" name="issue[]" type="checkbox" > Smoking in vehicle
                                <input id="fieldaddress" class="form-control" name="issue[]" type="checkbox" > Offroad with vehicle
                                <input id="fieldaddress" class="form-control" name="issue[]" type="checkbox" > Mechanical damage
                                <input id="fieldaddress" class="form-control" name="issue[]" type="checkbox" > Interior damage
                                <input id="fieldaddress" class="form-control" name="issue[]" type="checkbox" > Body damage
                                  <input id="fieldaddress" class="form-control" name="issue[]" type="checkbox" > Minor damage
                                  <input id="fieldaddress" class="form-control" name="issue[]" type="checkbox" > Major damage
                                <input id="fieldaddress" class="form-control" name="issue[]" type="checkbox" > UnNotified extension of vehicle

                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="fieldname" class="col-md-12 control-label">Was there any cost involved for the client?</label>
                              <div class="col-md-12">
                                <input id="fieldemail" class="form-control" type="radio" name="cost_involved" > Yes
                                <input id="fieldemail" class="form-control" type="radio" name="cost_involved" > No
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="fieldname" class="col-md-12 control-label">When did it happen?</label>
                              <div class="col-md-12">
                                <input id="fieldemail" class="form-control" type="text" name="heppens"  id="" >
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
