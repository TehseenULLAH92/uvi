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
                                        <tr>
                                            <td>John Doe</td>
                                            <td>ADSG12131</td>
                                            <td>Low</td>
                                        </tr>
                                        <tr>
                                            <td>John Doe</td>
                                            <td>ADSG12131</td>
                                            <td>Low</td>
                                        </tr>
                                        <tr>
                                            <td>John Doe</td>
                                            <td>ADSG12131</td>
                                            <td>Low</td>
                                        </tr>
                                        <tr>
                                            <td>John Doe</td>
                                            <td>ADSG12131</td>
                                            <td>Low</td>
                                        </tr>
                                        <tr>
                                            <td>John Doe</td>
                                            <td>ADSG12131</td>
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
                                  <thead>
                                    <tr>
                                      <th>Name</th>
                                      <th>License</th>
                                      <th>Total</th>
                                    </tr>
                                  </thead>
                                    <tbody>
                                        <tr>
                                            <td>John Doe</td>
                                            <td>ADSG12131</td>
                                            <td>3</td>
                                        </tr>
                                        <tr>
                                            <td>John Doe</td>
                                            <td>ADSG12131</td>
                                            <td>2</td>
                                        </tr>
                                        <tr>
                                            <td>John Doe</td>
                                            <td>ADSG12131</td>
                                            <td>2</td>
                                        </tr>
                                        <tr>
                                            <td>John Doe</td>
                                            <td>ADSG12131</td>
                                            <td>1</td>
                                        </tr>
                                        <tr>
                                            <td>John Doe</td>
                                            <td>ADSG12131</td>
                                            <td>1</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
          <div class="row">
              <!-- <div class="col-xs-12 col-md-3 col-sm-6 col-lg-4">
                  <a class="info-tiles tiles-orange" href="{{url('crcompanies/users')}}">
                      <div class="tiles-body">
                          <div class="pull-left"><?=$total_users?></div>
                          <div class="pull-right"><span class="text-smallcaps">Total Users</span></div>
                      </div>
                  </a>
              </div> -->
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
