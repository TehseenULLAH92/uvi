@extends('layouts.app')
@section('content')
<div id="page-content">
  <div id='wrap'>
    <div id="page-heading" class="page-bottom">
      <h1>Companies Overview</h1>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <a href="{{url('admin/companies/add')}}" class="btn btn-success btn-radius">+</a> Register New Company
        </div>
      </div>
    </div>
    <div class="container">
      <h1>List All Companies</h1>
      @include('flash::message')
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-sky">
            <div class="panel-body collapse in">
              <table cellpadding="0" cellspacing="0" border="0" class="table table-striped  datatables" id="example">
                <thead>
                  <tr>
                    <th>Type</th>
                    <th>Company</th>
                    <th>Address</th>
                    <th>Drivers Added</th>
                    <th>Reports Added</th>
                    <th>Member Until</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($companies as $key => $companie): ?>
                    <tr class="odd gradeX">
                      <td><?=$companie->type?></td>
                      <td><?=$companie->name?></td>
                      <td><?=$companie->address?></td>
                      <td>static - 10</td>
                      <td class="center"> static - 2</td>
                      <td class="center"><?=$companie->startdate?> - <?=$companie->enddate?></td>
                      <td class="center"><a href="{{  url('admin/companies/edit/'.$companie->id) }}">Edit</a>&nbsp;&nbsp;&nbsp;<a onclick="return confirm('Are you sure you want to delete it?');" href="{{  url('admin/companies/delete/'.$companie->id) }}">Delete</a>&nbsp;&nbsp;&nbsp;<a href="{{  url('admin/companies/profile/'.$companie->id) }}">Profile</a></td>
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
