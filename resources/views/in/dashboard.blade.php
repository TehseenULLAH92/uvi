@extends('layouts.app')

@section('content')
<div id="page-content">
  <div id='wrap'>
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-md-3 col-sm-6 col-lg-4">
          <a class="info-tiles tiles-orange" href="#">
            <div class="tiles-body">
              <div class="pull-left"><?=$total_users?></div>
              <div class="pull-right"><span class="text-smallcaps">Total Users</span></div>
            </div>
          </a>
        </div>
        <div class="col-xs-12 col-md-3 col-sm-6 col-lg-4">
          <a class="info-tiles tiles-success" href="#">
            <div class="tiles-body">
              <div class="pull-left"><?=$total_drivers?></div>
              <div class="pull-right"><span class="text-smallcaps">Total Drivers</span></div>
            </div>
          </a>
        </div>
        <div class="col-xs-12 col-md-3 col-sm-6 col-lg-4">
          <a class="info-tiles tiles-toyo" href="#">
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
                    <th>Submitted By</th>
                    <th>Severity</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>John Doe</td>
                    <td>Island Paradise Wheels</td>
                    <td>Low</td>
                  </tr>
                  <tr>
                    <td>John Doe</td>
                    <td>Island Paradise Wheels</td>
                    <td>Low</td>
                  </tr>
                  <tr>
                    <td>John Doe</td>
                    <td>Island Paradise Wheels</td>
                    <td>Low</td>
                  </tr>
                  <tr>
                    <td>John Doe</td>
                    <td>Island Paradise Wheels</td>
                    <td>Low</td>
                  </tr>
                  <tr>
                    <td>John Doe</td>
                    <td>Island Paradise Wheels</td>
                    <td>Low</td>
                  </tr>
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
                <tbody>
                  <tr>
                    <td>John Doe</td>
                    <td>3</td>
                  </tr>
                  <tr>
                    <td>John Doe</td>
                    <td>2</td>
                  </tr>
                  <tr>
                    <td>John Doe</td>
                    <td>2</td>
                  </tr>
                  <tr>
                    <td>John Doe</td>
                    <td>1</td>
                  </tr>
                  <tr>
                    <td>John Doe</td>
                    <td>1</td>
                  </tr>
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
                  <tr>
                    <td>Island Paradise Wheels</td>
                    <td>Monthly</td>
                    <td>20</td>
                    <td>20 Nov 2017</td>
                  </tr>
                  <tr>
                    <td>Island Paradise Wheels</td>
                    <td>Monthly</td>
                    <td>20</td>
                    <td>20 Nov 2017</td>
                  </tr>
                  <tr>
                    <td>Island Paradise Wheels</td>
                    <td>Monthly</td>
                    <td>20</td>
                    <td>20 Nov 2017</td>
                  </tr>
                  <tr>
                    <td>Island Paradise Wheels</td>
                    <td>Monthly</td>
                    <td>20</td>
                    <td>20 Nov 2017</td>
                  </tr>
                  <tr>
                    <td>Island Paradise Wheels</td>
                    <td>Monthly</td>
                    <td>20</td>
                    <td>20 Nov 2017</td>
                  </tr>

                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-xs-4">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h4>Companies  with most reports regostered</h4>
            </div>
            <div class="panel-body">
              <table class="table tab">
                <tbody>
                  <tr>
                    <td>Yummy Tracks</td>
                    <td>20</td>
                  </tr>
                  <tr>
                    <td>Cars for hire</td>
                    <td>18</td>
                  </tr>
                  <tr>
                    <td>Total Independance</td>
                    <td>15</td>
                  </tr>
                  <tr>
                    <td>All state care rental</td>
                    <td>12</td>
                  </tr>
                  <tr>
                    <td>Cheaper than rice cars</td>
                    <td>8</td>
                  </tr>
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
