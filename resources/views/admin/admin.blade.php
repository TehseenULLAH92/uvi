@extends('layouts.app')

@section('content')
<div id="page-content">
  <div id='wrap'>
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-md-3 col-sm-6 col-lg-4">
          <a class="info-tiles tiles-orange" href="{{url('admin/users')}}">
            <div class="tiles-body">
              <div class="pull-left"><?=$total_users?></div>
              <div class="pull-right"><span class="text-smallcaps">Total Users</span></div>
            </div>
          </a>
        </div>
        <div class="col-xs-12 col-md-3 col-sm-6 col-lg-4">
          <a class="info-tiles tiles-success" href="{{url('admin/drivers')}}">
            <div class="tiles-body">
              <div class="pull-left"><?=$total_drivers?></div>
              <div class="pull-right"><span class="text-smallcaps">Total Drivers</span></div>
            </div>
          </a>
        </div>
        <div class="col-xs-12 col-md-3 col-sm-6 col-lg-4">
          <a class="info-tiles tiles-toyo" href="{{url('admin/companies')}}">
            <div class="tiles-body">
              <div class="pull-left"><?=$total_companies?></div>
              <div class="pull-right"><span class="text-smallcaps">Total Companies</span></div>
            </div>
          </a>
        </div>
      </div>

      <div class="row">
        <div class="col-xs-8">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h4>Latest Reports</h4>
            </div>
            <div class="panel-body">
              <table class="table tab">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>License</th>
                    <th>Severity</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($latest_reports as $key => $single_report): ?>
                    <tr>
                      <td>{{$single_report->fname}}</td>
                      <td>{{$single_report->license}}</td>
                      <td>{{$single_report->severity}}</td>
                    </tr>
                  <?php endforeach; ?>
                  <!-- <?php foreach ($latest_creports as $key => $single_report): ?>
                    <tr>
                      <td><?php echo $single_report->name?></td>
                      <td>Company Doesn't Have License</td>
                      <td><?php echo $single_report->severity?></td>
                    </tr>
                  <?php endforeach; ?> -->

                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-xs-4">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h4>Drivers with most reports registered</h4>
            </div>
            <div class="panel-body">
              <table class="table tab">
                <thead>
                  <tr>
                      <td>Name</td>
                      <td>Total</td>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($driver_most_report_registered as $key => $single_report): ?>
                    <tr>
                      <td>{{$single_report->name}}</td>
                      <td>
                        <?php
                        echo $single_report->total;
                        ?>
                        </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-xs-8">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h4>Expiring memberships</h4>
            </div>
            <div class="panel-body">
              <table class="table tab">
                <thead>
                  <tr>
                    <th>Company</th>
                    <th>Type</th>
                    <th>Days Left</th>
                    <th>Expiry Date</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($expiring_memberships as $key => $expiring_membership): ?>
                    <tr>
                      <td><?=$expiring_membership->name?></td>
                      <td><?=$expiring_membership->membership?></td>
                      <td>
                        <?php
                          $datetime1 = strtotime($expiring_membership->startdate);
                          $datetime2 = strtotime($expiring_membership->enddate);
                          $interval = $datetime2 - $datetime1;
                          //echo $interval->date('');

                        ?>
                        <?=floor($interval / 86400)?></td>
                      <td><?=date("j F Y",strtotime($expiring_membership->enddate))?></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-xs-4">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h4>Companies  with most reports registered</h4>
            </div>
            <div class="panel-body">
              <table class="table tab">
                <thead>
                  <tr>
                      <td>Name</td>
                      <td>Total</td>
                  </tr>
                </thead>
                  <tbody>
                  <?php foreach ($companies_most_report_registered as $key => $single_report): ?>
                    <tr>
                      <td>{{$single_report->name}}</td>
                      <td>{{$single_report->total}}</td>
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
