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
          <a href="{{url('incompanies/drivers/add')}}" class="btn btn-success btn-radius">+</a> Register New Driver
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
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Join Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($drivers as $key => $driver): ?>
                    <tr class="odd gradeX">
                      <td><?=$driver->name?></td>
                      <td><?=$driver->email?></td>
                      <td><?=$driver->phonenumber?></td>
                      <td><?=$driver->address?></td>
                      <td><?=$driver->joiningdate?></td>
                      <td><a href="{{  url('incompanies/drivers/edit/'.$driver->id) }}">Edit</a>&nbsp;&nbsp;&nbsp;<a onclick="return confirm('Are you sure you want to delete it?');" href="{{  url('incompanies/drivers/delete/'.$driver->id) }}">Delete</a></td>
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
