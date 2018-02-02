<?php

namespace App\Http\Controllers\Cr;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth,App\Reports,DB,App\Drivers;

class ReportController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
  public function index()
  {
    $reports = DB::table('reports')
    ->leftJoin('drivers', 'reports.driver_id', '=', 'drivers.id')
    ->select('*')
    ->get();
    return view('cr.reports.list',['reports' =>$reports]);
  }
  public function add_new_report(Request $request){
    $data['title']          = $request->input('title');
    $data['severity']       = $request->input('severity');
    $data['issue']          = $request->input('issue');
    $data['cost_involved']  = $request->input('cost_involved');
    $data['heppens']        = $request->input('heppens');

    $inserted = DB::table('reports')->insert($data);
    if($inserted)
    {
      return redirect('crcompanies/reports')->with('alert-success', 'Report Has Been Inserted Successfully');
    }
    else
    {
      return redirect('crcompanies/reports/add')->with('alert-error', 'Something whent wrong');
    }
  }
  public function add(){
    return view('cr.reports.add');
  }
  public function add_new_report_view($id){
    $driver = Drivers::find($id);
    $drivers = DB::table('drivers')
    ->select('*')
    ->where('drivers.id',$id)
    ->get();
    return view('cr.reports.add_report',['drivers' => $drivers,'driver'=>$driver]);
  }
  public function add_new_report_id(Request $request,$id){

    $issue = implode(",", $request->input('issue'));

    $data['driver_id']      = $request->input('driver_id');
    $data['company_id']      = $request->input('company_id');
    $data['report_submitted_person']      = Auth::user()->name;
    $data['title']          = $request->input('title');
    $data['severity']       = $request->input('severity');
    $data['issue']          = $issue;
    $data['cost_involved']  = $request->input('cost_involved');
    $data['heppens']        = $request->input('heppens');
    $data['created_at']     = date('Y-m-d H:i:s');
    $data['updated_at']     = date('Y-m-d H:i:s');

    $inserted = DB::table('reports')->insert($data);
    if($inserted)
    {
      flash('Report Added Successfully')->success();
      return redirect('crcompanies/reports');
    }
    else
    {
      flash('Error')->error();
      return redirect('crcompanies/reports/add_report'.$id);
    }
  }
}
