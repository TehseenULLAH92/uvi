<?php

namespace App\Http\Controllers\Cre;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB,App\User;
class ReportsController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
  public function index()
  {
    return view('cre.reports.list');
  }
}
