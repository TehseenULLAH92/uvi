@extends('layouts.app')
@section('content')
<div id="page-content">
  <div id='wrap'>
    <div id="page-heading" class="page-bottom">
      <h1>Report Overview</h1>
    </div>
    <div class="container">
      <!-- <div class="row">
        <div class="col-md-12">
          <a href="{{url('admin/reports/add')}}" class="btn btn-success btn-radius">+</a> Register New Report
        </div>
      </div> -->
    </div>
    <div class="container">
      <h1>List All Drivers Report</h1>
      @include('flash::message')
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-sky">
            <div class="panel-body collapse in">
              <table cellpadding="0" cellspacing="0" border="0" class="table table-striped  datatables" id="example">
                <thead>
                  <tr>
                    <th>Title</th>
                    <th>Driver</th>
                    <th>Severity</th>
                    <th>What's The Issue?</th>
                    <th>Involved Client Cost?</th>
                    <th>What Did It Happen?</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($reports as $key => $report): ?>
                    <tr class="odd gradeX">
                      <td><?=$report->title?></td>
                      <td><?=$report->name?></td>
                      <td><?=$report->severity?></td>
                      <td><?=$report->issue?></td>
                      <td><?=$report->cost_involved?></td>
                      <td><?=$report->heppens?></td>
                      <td><a href="{{  url('admin/driver_report/edit/'.$report->id) }}">Edit</a>&nbsp;&nbsp;&nbsp;<a onclick="return confirm('Are you sure you want to delete it?');" href="{{  url('admin/reports/delete/'.$report->id) }}">Delete</a></td>
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
