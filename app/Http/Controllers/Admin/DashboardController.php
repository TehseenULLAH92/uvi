<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth,DB,App\User;

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
      ->whereNull('company_id')
      ->select('*')
      ->limit(3)
      ->orderByRaw('reports.id DESC')
      ->get();
      $data['latest_creports'] = DB::table('reports')
      ->leftJoin('companies', 'reports.company_id', '=', 'companies.id')
      ->whereNull('driver_id')
      ->select('*')
      ->limit(2)
      ->orderByRaw('reports.id DESC')
      ->get();
      // tab driver with most report registered
      $data['driver_most_report_registered'] = DB::table('reports')
      ->leftJoin('drivers', 'reports.driver_id', '=', 'drivers.id')
      ->whereNull('company_id')
      ->select('*')
      ->limit(3)
      ->orderByRaw('reports.id DESC')
      ->get();
      // tab companies with most report registered
      $data['companies_most_report_registered'] = DB::table('reports')
      ->leftJoin('companies', 'reports.company_id', '=', 'companies.id')
      ->whereNull('driver_id')
      ->select('*')
      //->count('company_id')
      //->groupBy('reports.id')
      ->limit(5)
      ->orderByRaw('reports.id DESC')
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
