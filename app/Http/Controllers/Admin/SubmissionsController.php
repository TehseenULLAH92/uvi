<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
//use Auth,App\User,App\Payments,App\Donations,App\Requests,DB;

class SubmissionsController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  public function index()
    {
      return view('admin.submissions');
    }
}
