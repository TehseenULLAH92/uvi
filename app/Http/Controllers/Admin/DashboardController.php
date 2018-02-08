<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth,DB,App\User, App\Reports;

class DashboardController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index()
    {
      // tab latest report
      $data['latest_reports'] = DB::table('reports')
      ->leftJoin('drivers', 'reports.driver_id', '=', 'drivers.id')
      ->whereNull('reports.company_id')
      ->select('*')
      ->limit(3)
      ->orderByRaw('reports.id DESC')
      ->get();
      $data['latest_creports'] = DB::table('reports')
      ->leftJoin('companies', 'reports.company_id', '=', 'companies.id')
      ->whereNull('reports.driver_id')
      ->select('*')
      ->limit(2)
      ->orderByRaw('reports.id DESC')
      ->get();
      //tab driver with most report registered

      //$data['driver_most_report_registered'] = DB::table('select drivers.name, count(*) as total from reports JOIN drivers ON reports.driver_id = drivers.id GROUP BY drivers.id');
      $data['driver_most_report_registered'] =   DB::table('reports')
      ->JOIN('drivers', 'reports.driver_id', '=', 'drivers.id')
      //->whereNull('reports.company_id')
      ->select(array('drivers.id as id', 'drivers.name as name', DB::raw('COUNT(reports.driver_id) as total')))
      ->groupBy(['drivers.id','drivers.name'])
      ->limit(3)
      ->get();
      // tab companies with most report registered
      $data['companies_most_report_registered'] = DB::table('reports')
      ->leftJoin('companies', 'reports.company_id', '=', 'companies.id')
      ->whereNull('reports.driver_id')
      ->select(array('companies.id as id', 'companies.name as name', DB::raw('COUNT(reports.company_id) as total')))
      ->groupBy(['companies.id','companies.name'])
      ->limit(3)
      ->get();

      // tab Expiring memberships
      $data['expiring_memberships'] = DB::table('companies')
      ->select('*')
      ->limit(5)
      ->orderByRaw('companies.id DESC')
      ->get();

      $data['total_users']      = DB::table('users')->count();
      $data['total_drivers']    = DB::table('drivers')->count();
      $data['total_companies']  = DB::table('companies')->count();
      return view('admin.admin',$data);
    }
  public function dashboard()
    {
      $data['latest_reports'] = DB::table('reports')
      ->leftJoin('drivers', 'reports.driver_id', '=', 'drivers.id')
      ->select('*')
      ->limit(5)
      ->orderByRaw('reports.id DESC')
      ->get();
      $data['total_users']      = DB::table('users')->count();
      $data['total_drivers']    = DB::table('drivers')->count();
      $data['total_companies']  = DB::table('companies')->count();
      return view('admin.admin',$data);
    }

}
