<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth,App\Reports,DB,App\Drivers,App\Companies;

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
    ->whereNull('company_id')
    ->select('*')
    ->get();
    return view('admin.reports.list',['reports' =>$reports]);
  }
  public function cindex()
  {
    $reports = DB::table('reports')
    ->leftJoin('companies', 'reports.company_id', '=', 'companies.id')
    ->whereNull('driver_id')
    ->select('*')
    ->get();
    return view('admin.reports.clist',['reports' =>$reports]);
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
      return redirect('admin/reports/drivers')->with('alert-success', 'Report Has Been Inserted Successfully');
    }
    else
    {
      return redirect('admin/reports/add')->with('alert-error', 'Something whent wrong');
    }
  }
  public function add(){
    return view('admin.reports.add');
  }
  public function add_new_report_view($id){
    $driver = Drivers::find($id);

    return view('admin.reports.add_report',['driver'=>$driver]);
  }
  public function add_new_creport_view($id){
    $company = Companies::find($id);

    return view('admin.reports.add_report_company',['company'=>$company]);
  }
  public function add_new_report_id(Request $request,$id){

    $issue = implode(",", $request->input('issue'));

    $data['driver_id']      = $request->input('driver_id');
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
      return redirect('admin/reports/drivers');
    }
    else
    {
      flash('Error')->error();
      return redirect('admin/reports/add_report'.$id);
    }
  }
  public function add_new_creport_id(Request $request,$id){

    $issue = implode(",", $request->input('issue'));

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
      return redirect('admin/reports/companies');
    }
    else
    {
      flash('Error')->error();
      return redirect('admin/reports/add_report'.$id);
    }
  }
}
