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

                    <th>Logs</th>
                    <th>Role</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($users as $key => $companie): ?>
                    <tr class="odd gradeX">
                      <td><?=$companie->name?></td>
                      <td><?=$companie->email?></td>
                      <td><?php if ($companie->role == 'cremployees') {
                          echo '<a href="' . url("crcompanies/users/visited_drivers/".$companie->id) . '">Visited drivers</a>';
                      } elseif ($companie->role == 'incompanies') {
                         echo '<a href="' . url("crcompanies/users/visited_drivers/".$companie->id) . '">Visited drivers</a> | <a href="' . url("crcompanies/users/created_reports/".$companie->id) . '">Created reports</a>';
                      }  elseif ($companie->role == 'crcompanies') {
                         echo '<a href="' . url("crcompanies/users/created_users/".$companie->id) . '">Created users</a> | <a href="' . url("crcompanies/users/created_drivers/".$companie->id) . '">Created drivers</a>';
                      } ?></td>
                      <td><?php
                      if($companie->role == "admin"){
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
                      }
                      ?></td>
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
