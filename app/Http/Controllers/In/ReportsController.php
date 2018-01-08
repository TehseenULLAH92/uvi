<?php

namespace App\Http\Controllers\In;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth,App\User,DB,Hash,File;


class ReportsController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
  public function index()
  {
    //$reports = Reports::All();
    //return view('in.reports.list',['reports' =>$reports]);
    return view('in.reports.list');
  }
}
