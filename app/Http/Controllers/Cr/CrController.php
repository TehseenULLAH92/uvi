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
      $data['total_users']      = DB::table('users')->count();
      $data['total_drivers']    = DB::table('drivers')->count();
      $data['total_companies']  = DB::table('companies')->count();
      return view('cr.index',$data);
    }
}
