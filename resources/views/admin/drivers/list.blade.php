@extends('layouts.app')
@section('content')
<div id="page-content">
  <div id='wrap'>
    <div id="page-heading" class="page-bottom">
      <h1>Drivers Overview</h1>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <a href="{{url('admin/drivers/add')}}" class="btn btn-success btn-radius">+</a> Register New Driver
        </div>
      </div>
    </div>
    <div class="container">
      <h1>List All Drivers</h1>
      @include('flash::message')
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-sky">
            <div class="panel-body collapse in">
              <table cellpadding="0" cellspacing="0" border="0" class="table table-striped  datatables" id="example">
                <thead>
                  <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Driver License</th>
                    <th>Report Amount</th>
                    <th>Submitted By</th>
                    @if(Auth::user()->role = 'admin')
                    <th>Logs</th>
                    @endif
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($drivers as $key => $driver): ?>
                    <tr class="odd gradeX">
                      <td><?=$driver->fname?></td>
                      <td><?=$driver->lname?></td>
                      <td><?=$driver->license?></td>
                      <td><?php echo "1";?></td>
                      <td><?php echo $driver->submitted_by;?></td>
                      <!-- <td><?php //echo $driver->email?></td> -->
                        <td><?php
                          echo '<a href="' . url("admin/users/driver_visitors/".$driver->id) . '">Visitors</a> | <a href="' . url("admin/users/driver_reports/".$driver->id) . '">Reporters</a>';
                       ?></td>
                      <td><?php //echo $driver->joiningdate?></td>
                      <td><!-- <a href="{{  url('admin/drivers/edit/'.$driver->id) }}">Edit</a>&nbsp;&nbsp;&nbsp; --><a href="{{  url('admin/reports/add_report/'.$driver->id) }}">Add Report</a><!-- &nbsp;&nbsp;&nbsp;<a onclick="return confirm('Are you sure you want to delete it?');" href="{{  url('admin/drivers/delete/'.$driver->id) }}">Delete</a> --></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- container -->
  </div> <!--wrap -->
</div> <!-- page-content -->
@endsection
