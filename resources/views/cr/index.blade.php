@extends('layouts.app')

@section('content')
<div id="page-content">
  <div id='wrap'>
    <div class="container">
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
                      <td>{{$single_report->name}}</td>
                      <td>{{$single_report->license}}</td>
                      <td>{{$single_report->severity}}</td>
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
        <div class="col-xs-12 col-md-6 col-sm-6 col-lg-6">
          <a class="info-tiles tiles-success" href="{{url('crcompanies/drivers')}}">
            <div class="tiles-body">
              <div class="pull-left"><?=$total_drivers?></div>
              <div class="pull-right"><span class="text-smallcaps">Total Drivers</span></div>
            </div>
          </a>
        </div>
        <div class="col-xs-12 col-md-6 col-sm-6 col-lg-6">
          <a class="info-tiles tiles-toyo" href="#">
            <div class="tiles-body">
              <div class="pull-left"><?=$total_companies?></div>
              <div class="pull-right"><span class="text-smallcaps">Total Reports</span></div>
            </div>
          </a>
        </div>
      </div>
    </div> <!-- container -->
  </div> <!--wrap -->
</div> <!-- page-content -->
@endsection
