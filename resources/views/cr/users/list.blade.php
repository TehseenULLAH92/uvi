@extends('layouts.app')
@section('content')
<div id="page-content">
  <div id='wrap'>
    <div id="page-heading" class="page-bottom">
      <h1>Users Overview</h1>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <a href="{{url('crcompanies/users/add')}}" class="btn btn-success btn-radius">+</a> Register New User
        </div>
      </div>
    </div>
    <div class="container">
      <h1>List All Users</h1>
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
                    <th>Role</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($users as $key => $user): ?>
                    <tr class="odd gradeX">
                      <td><?=$user->name?></td>
                      <td><?=$user->email?></td>
                      <td><?php if($user->role == "cremployees"){
                        echo "<strong class='btn btn-green'>Level 3 CRE</strong>";
                      }?></td>
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
