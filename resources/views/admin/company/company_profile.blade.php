@extends('layouts.app')

@section('content')
<div id="page-content">
  <div id='wrap'>
    <div id="page-heading" class="page-bottom">
      <h1>Company Profile</h1>
    </div>


    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-info">
            <div class="panel-body">
              <form action="#" id="wizard" class="form-horizontal">
                <fieldset title="1">
                  <legend>General</legend>
                  <div class="container">

                    <div class="row">
                      <div class="col-md-12">
                        <div class="panel panel-midnightblue">
                          <div class="panel-body">
                            <div class="row">
                              <div class="col-md-12">
                                <!-- <img src="{{asset('admin/assets/demo/avatar/johansson.png')}}" alt="" class="pull-left" style="margin: 0 20px 20px 0"> -->
                                <img src="{{ URL::asset('uploads/company/'.$companies->image) }}" class="pull-left img-responsive pic-bordered" alt="">
                                <div class="table-responsive">
                                  <table class="table table-condensed company_profile">
                                    <h3><strong><?=$companies->name?></strong>
                                      <a href="{{  url('admin/companies/edit/'.$companies->id) }}" class="btn btn-midnightblue linkWidth">Edit</a>
                                      <a  onclick="return confirm('Are you sure you want to delete it?');" href="{{  url('admin/companies/delete/'.$companies->id) }}" class="btn btn-midnightblue linkWidth">Delete</a></h3>

                                  <tbody>
                                    <tr>
                                      <td>Type of Company</td>
                                      <td><a href="#"><?php
                                      if($companies->type =="CR"){
                                        echo "Car Rental Company";
                                      }
                                      else {
                                        echo "Insurance Company";
                                      }
                                      ?></a></td>
                                      <td>Email</td>
                                      <td><a href="#"><?=$companies->email?></a></td>
                                    </tr>
                                    <tr>
                                      <td>Address</td>
                                      <td><a href="#"><?=$companies->address?></a></td>
                                      <td>Website</td>
                                      <td><a href="#"><?=$companies->website?></a></td>
                                    </tr>

                                    <tr>
                                      <td>Phone Number</td>
                                      <td><?=$companies->phonenumber?></td>
                                    </tr>
                                    <tr><td colspan="4"><hr></td></tr>
                                    <tr>
                                      <td>First Name</td>
                                      <td><?=$companies->personfname?></td>
                                      <td>Phone Number</td>
                                      <td><?=$companies->personphone?></td>
                                    </tr>
                                    <tr>
                                      <td>Last Name</td>
                                      <td><?=$companies->personlname?></td>
                                      <td>Email</td>
                                      <td><a href="#"><?=$companies->personemail?></a></td>
                                    </tr>
                                    <tr><td colspan="4"><hr></td></tr>

                                    <tr>
                                      <td>Starting membership</td>
                                      <td><?=$companies->startdate?></td>
                                      <td rowspan="2"> <a href="{{  url('admin/companies/edit/'.$companies->id) }}" class="btn btn-midnightblue linkWidthextended">Extend Membership</a></td>
                                    </tr>
                                    <tr>
                                      <td>End of  membership</td>
                                      <td><?=$companies->enddate?></td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div> <!-- container -->

                <div class="form-group">
                  <div class="col-md-12">
                    <div class="container">
                      <h4>Registered users of Wheels for more</h4>
                      <hr>
                      <div class="row">
                        <div class="container">
                          <div class="row">
                           <!--  <div class="col-md-12">
                              <?php if(isset($companie)) ?>
                              <a href="{{  url('admin/users/add_user/'.$companies->id) }}" class="btn btn-success btn-radius">+</a> Register New User
                            </div> -->
                             <div class="col-md-12">
                              <?php if(isset($companie)) ?>
                              <a href="{{  url('admin/drivers/add/'.$companies->id) }}" class="btn btn-success btn-radius">+</a> Register New Driver
                            </div>
                          </div>
                        </div>
                        <hr>
                        <div class="col-md-12">
                          <table cellpadding="0" cellspacing="0" border="0" class="table table-striped  datatables" id="example">
                            <thead>
                              <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php foreach ($drivers as $key => $companie): ?>
                                <tr class="odd gradeX">
                                  <td><?=$companie->name?></td>
                                  <td><?=$companie->email?></td>
                                 <!--  <td><?php
                                 /* if($companie->role == "admin"){
                                    echo "<strong class='btn btn-green'>&nbsp;&nbsp;&nbsp;&nbsp;Level 1 &nbsp;&nbsp;&nbsp;</strong>";
                                  }
                                  else if($companie->role == "crcompanies"){
                                    echo " <strong class='btn btn-green'>Level 2A CR</strong> ";
                                  }
                                  else if($companie->role == "incompanies"){
                                    echo "<strong class='btn btn-green'>Level 2B IN </strong>";
                                  }
                                  else {
                                    echo "<strong class='btn btn-green'>Level 3 CRE</strong>";
                                  }*/
                                  ?></td> -->
                                  <td class="center"><a href="{{  url('admin/users/edit/'.$companie->id) }}">Edit</a>&nbsp;&nbsp;&nbsp;<a onclick="return confirm('Are you sure you want to delete it?');" href="{{  url('admin/users/delete/'.$companie->id) }}">Delete</a></td>
                                </tr>
                              <?php endforeach; ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div> <!-- container -->
                  </div>
                </div>
              </fieldset>
              <fieldset title="2">
                <legend>Log</legend>

                <div class="row">
                  <div class="col-xs-12">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Action Taken</th>
                          <th>Date</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>Viewed Profile of <a href="#">John Doe</a></td>
                          <td>15 mar 2018</td>
                        </tr>
                        <tr>
                          <td>1</td>
                          <td>Viewed Profile of <a href="#">John Doe</a></td>
                          <td>15 mar 2018</td>
                        </tr>
                        <tr>
                          <td>1</td>
                          <td>Viewed Profile of <a href="#">John Doe</a></td>
                          <td>15 mar 2018</td>
                        </tr>

                      </tbody>
                    </table>
                  </div>
                </div>
              </fieldset>
              <input type="submit" class="finish btn-success btn"  style="display:none" value="Submit" />
            </form>
          </div>
        </div>
      </div>
    </div>
  </div> <!-- container -->
</div> <!--wrap -->
</div> <!-- page-content -->
@endsection
