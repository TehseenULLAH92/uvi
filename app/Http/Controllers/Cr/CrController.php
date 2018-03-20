<?php

namespace App\Http\Controllers\Cr;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB,App\User;
class CrController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  public function index()
    {
      //$data['total_users'] = User::where('role', 'user')->count();
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
      $data['driver_most_report_registered'] =   DB::table('reports')
      ->JOIN('drivers', 'reports.driver_id', '=', 'drivers.id')
      //->whereNull('reports.company_id')
      ->select(array('drivers.id as id', 'drivers.fname as name', DB::raw('COUNT(reports.driver_id) as total')))
      ->groupBy(['drivers.id','drivers.fname'])
      ->limit(3)
      ->get();
      $data['total_users']      = DB::table('users')->count();
      $data['total_drivers']    = DB::table('drivers')->count();
      $data['total_companies']  = DB::table('companies')->count();
      return view('cr.index',$data);
    }
}
