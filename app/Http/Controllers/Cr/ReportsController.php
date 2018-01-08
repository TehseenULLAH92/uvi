<?php

namespace App\Http\Controllers\Cr;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportsController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  public function index()
    {
      return view('cr.reports.list');
    }
}
