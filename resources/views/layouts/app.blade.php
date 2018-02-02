<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Car Rent') }}</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Avant">
  <meta name="author" content="The Red Team">
  <link rel="stylesheet" href="{{ asset('admin/assets/css/styles.minc726.css?=140') }}">
  <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600' rel='stylesheet' type='text/css'>
  <link rel='stylesheet' type='text/css' href="{{ asset('admin/assets/demo/variations/default.css') }}" media='all' id='styleswitcher'>
  <link rel='stylesheet' type='text/css' href="{{ asset('admin/assets/plugins/form-daterangepicker/daterangepicker-bs3.css') }}" />
  <link rel='stylesheet' type='text/css' href="{{ asset('admin/assets/plugins/fullcalendar/fullcalendar.css') }}" />
  <link rel='stylesheet' type='text/css' href="{{ asset('admin/assets/plugins/form-markdown/css/bootstrap-markdown.min.css') }}" />
  <link rel='stylesheet' type='text/css' href="{{ asset('admin/assets/plugins/codeprettifier/prettify.css') }}" />
  <link rel='stylesheet' type='text/css' href="{{ asset('admin/assets/plugins/form-toggle/toggles.css') }}" />
  <link rel='stylesheet' type='text/css' href="{{ asset('admin/assets/plugins/datatables/dataTables.css') }}" />
  <link rel='stylesheet' type='text/css' href="{{ asset('admin/assets/plugins/form-select2/select2.css') }}" />
</head>
<body class="">
  <div id="app">
    <?php if (Auth::user()): ?>
      <header class="navbar navbar-inverse navbar-fixed-top" role="banner">
        <div class="navbar-header pull-left">
          <a class="navbar-brand" href="{{'/'}}">{{ config('app.name', 'Rent Car') }}</a>
        </div>
        <ul class="nav navbar-nav pull-right toolbar">
          <li><a href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">Log Out</a> </li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
            </form>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle username" data-toggle="dropdown"><span class="hidden-xs">Settings <i class="fa fa-caret-down"></i></span></a>
              <ul class="dropdown-menu userinfo arrow">
                <li class="userlinks">
                  <ul class="dropdown-menu">
                    <!-- <li><a href="{{ route('register') }}">Register User <i class="pull-right fa fa-pencil"></i></a></li> -->
                    <?php if (Auth::user()->role == "admin"): ?>
                      <li><a href="{{url('admin/profile')}}">Edit Profile <i class="pull-right fa fa-pencil"></i></a></li>
                      <li><a href="{{url('admin/account')}}">Account <i class="pull-right fa fa-cog"></i></a></li>
                    <?php endif; ?>
                    <?php if (Auth::user()->role == "incompanies"): ?>
                      <li><a href="{{url('incompanies/profile')}}">Edit Profile <i class="pull-right fa fa-pencil"></i></a></li>
                      <li><a href="{{url('incompanies/account')}}">Account <i class="pull-right fa fa-cog"></i></a></li>
                    <?php endif; ?>
                    <?php if (Auth::user()->role == "crcompanies"): ?>
                      <li><a href="{{url('crcompanies/profile')}}">Edit Profile <i class="pull-right fa fa-pencil"></i></a></li>
                      <li><a href="{{url('crcompanies/account')}}">Account <i class="pull-right fa fa-cog"></i></a></li>
                    <?php endif; ?>
                    <?php if (Auth::user()->role == "cremployees"): ?>
                      <li><a href="{{url('cremployees/profile')}}">Edit Profile <i class="pull-right fa fa-pencil"></i></a></li>
                      <li><a href="{{url('cremployees/account')}}">Account <i class="pull-right fa fa-cog"></i></a></li>
                    <?php endif; ?>
                    <!-- <li><a href="#">Help <i class="pull-right fa fa-question-circle"></i></a></li> -->
                  </ul>
                </li>
              </ul>
            </li>
            <li><a href="#">|</a> </li>
            <?php if (Auth::user()): ?>
              <li><a href="#">Welcome back [{{ Auth::user()->name }}]</a></li>
            <?php endif; ?>
          </ul>
        </header>
      <?php endif; ?>

      <div id="page-container">
        <!-- BEGIN SIDEBAR -->
        <?php if (Auth::user()): ?>
          <nav id="page-leftbar" role="navigation">
            <!-- BEGIN SIDEBAR MENU -->
            <ul class="acc-menu" id="sidebar">
              <!-- Administration LEVEL 1 -->
              <?php if (Auth::user()->role == "admin"): ?>
                <li><a href="{{url('admin/dashboard')}}"> <span>Home</span></a></li>
                <li><a href="{{url('admin/companies')}}"> <span>Companies</span></a></li>
                <li><a href="{{url('admin/users')}}"> <span>Users</span></a></li>
                <li><a href="{{url('admin/drivers')}}"> <span>Drivers</span></a></li>
                <li><a href="{{url('admin/submissions')}}"> <span>Submissions</span></a></li>
                <li><a href="javascript:;"> <span>Reports</span> </a>
                  <ul class="acc-menu">
                      <li><a href="{{url('admin/reports/drivers')}}"><span>Drivers</span></a></li>
                      <li><a href="{{url('admin/reports/companies')}}"><span>Companies</span></a></li>
                  </ul>
                </li>
              <?php endif; ?>
              <!-- Insurance Companies LEVEL 2B -->
              <?php if (Auth::user()->role == "incompanies"): ?>
                <li><a href="{{url('incompanies/dashboard')}}"> <span>Home</span></a></li>
                <li><a href="{{url('incompanies/drivers')}}"> <span>Drivers</span></a></li>
                <!-- <li><a href="{{url('incompanies/reports')}}"> <span>Reports</span></a></li> -->
              <?php endif; ?>
              <!-- Car Rental Companies LEVEL 2A -->
              <?php if (Auth::user()->role == "crcompanies"): ?>
                <li><a href="{{url('crcompanies/dashboard')}}"> <span>Home</span></a></li>
                <li><a class=""href="{{url('crcompanies/users')}}"> <span>Users</span></a></li>
                <li><a class="" href="{{url('crcompanies/drivers')}}"> <span>Drivers</span></a></li>
                <!-- <li><a class="" href="{{url('crcompanies/reports')}}"> <span>Reports</span></a></li> -->
              <?php endif; ?>
              <!-- Car Rental Employees LEVEL 3 -->
              <?php if (Auth::user()->role == "cremployees"): ?>
                <li><a href="{{url('cremployees/dashboard')}}"> <span>Home</span></a></li>
                <li><a class="" href="{{url('cremployees/drivers')}}"> <span>Drivers</span></a></li>
                <!-- <li><a href="{{url('cremployees/reports')}}"> <span>Reports</span></a></li> -->
              <?php endif; ?>
            </ul>
          </nav>
        <?php endif; ?>
        @yield('content')
      </div>
      <footer role="contentinfo">
        <div class="clearfix">
          <ul class="list-unstyled list-inline pull-left">
            <li><!--AVANT &copy; 2014--></li>
          </ul>
          <button class="pull-right btn btn-inverse-alt btn-xs hidden-print" id="back-to-top"><i class="fa fa-arrow-up"></i></button>
        </div>
      </footer>
    </div> <!-- page-container -->
    <!-- Scripts -->
    <script type='text/javascript' src="{{ asset('admin/assets/js/jquery-1.10.2.min.js') }}"></script>
    <script type='text/javascript' src="{{ asset('admin/assets/js/jqueryui-1.10.3.min.js') }}"></script>
    <script type='text/javascript' src="{{ asset('admin/assets/js/bootstrap.min.js') }}"></script>
    <script type='text/javascript' src="{{ asset('admin/assets/plugins/form-toggle/toggle.min.js') }}"></script>
    <script type='text/javascript' src="{{ asset('admin/assets/plugins/form-validation/jquery.validate.min.js') }}"></script>
    <script type='text/javascript' src="{{ asset('admin/assets/plugins/form-select2/select2.min.js') }}"></script>
    <script type='text/javascript' src="{{ asset('admin/assets/demo/demo-formwizard.js') }}"></script>
    <script type='text/javascript' src="{{ asset('admin/assets/plugins/form-stepy/jquery.stepy.js') }}"></script>
    <script type='text/javascript' src="{{ asset('admin/assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script type='text/javascript' src="{{ asset('admin/assets/plugins/datatables/dataTables.bootstrap.js') }}"></script>
    <script type='text/javascript' src="{{ asset('admin/assets/demo/demo-datatables.js') }}"></script>
    <script type='text/javascript' src="{{ asset('admin/assets/plugins/form-datepicker/js/bootstrap-datepicker.js') }}"></script>
    <script type='text/javascript' src="{{ asset('admin/assets/js/jquery.nicescroll.min.js') }}"></script>
    <script type='text/javascript' src="{{ asset('admin/assets/js/enquire.js') }}"></script>
    <script type='text/javascript' src="{{ asset('admin/assets/js/application.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#datepicker1,#datepicker2').datepicker({
              format: 'yyyy-mm-dd'
            });
            $("#e1,#e2").select2({
                //minimumInputLength: 0,
                width: 'resolve'
            });
        });
    </script>
    <!-- <script src="{{ asset('js/app.js') }}"></script> -->
  </body>
  </html>
