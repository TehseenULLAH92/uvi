@extends('layouts.app')

@section('content')
<div id="page-content">
  <div id='wrap'>
    <div id="page-heading" class="page-bottom">
      <h1>Driver Profile</h1>
    </div>


    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-info">
            <div class="panel-body">
              <form action="#" id="wizard" class="form-horizontal">
                <fieldset title="1">
                  <legend>General</legend>
                  <div class="container">

                    <div class="row">
                      <div class="col-md-12">
                        <div class="panel panel-midnightblue">
                          <div class="panel-body">
                            <div class="row">
                              <div class="col-md-12">
                                <div class="table-responsive">
                                  <table class="table table-condensed company_profile">
                                    <h3><strong><?=$driver->name?></strong>

                                  <tbody>
                                    <tr>
                                      <td>Name</td>
                                      <td><a href="#">
                                        <?=$driver->name?>
                                      </a></td>
                                      <td>Email</td>
                                      <td><a href="#"><?=$driver->email?></a></td>
                                    </tr>
                                    <tr>
                                      <td>Phone Number</td>
                                      <td><a href="#"><?=$driver->phonenumber?></a></td>
                                      <td>Address</td>
                                      <td><a href="#"><?=$driver->address?></a></td>
                                    </tr>
                                    <tr>
                                      <td>Joining Date</td>
                                      <td><?=$driver->joiningdate?></td>
                                    </tr>
                                    <tr><td colspan="4"><hr></td></tr>

                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div> <!-- container -->

              </fieldset>
              <input type="submit" class="finish btn-success btn"  style="display:none" value="Submit" />
            </form>
          </div>
        </div>
      </div>
    </div>
  </div> <!-- container -->
</div> <!--wrap -->
</div> <!-- page-content -->
@endsection
