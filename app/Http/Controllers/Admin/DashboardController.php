<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth,DB,App\User;
//use Auth,App\User,App\Payments,App\Donations,App\Requests,DB;

class DashboardController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  public function index()
    {
      //$data['total_users'] = User::where('role', 'user')->count();
      $data['total_users']      = DB::table('users')->count();
      $data['total_drivers']    = DB::table('drivers')->count();
      $data['total_companies']  = DB::table('companies')->count();
      return view('admin.admin',$data);
    }
  public function dashboard()
    {
      //$data['total_users'] = User::where('role', 'user')->count();
      $data['total_users']      = DB::table('users')->count();
      $data['total_drivers']    = DB::table('drivers')->count();
      $data['total_companies']  = DB::table('companies')->count();
      return view('admin.admin',$data);
    }

}
