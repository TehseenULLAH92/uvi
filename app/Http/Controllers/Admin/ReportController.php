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
    ->whereNull('reports.company_id')
    ->where('reports.status', 1)
    ->select('reports.*', 'drivers.*', 'reports.id as id')
    ->get();
    return view('admin.reports.list',['reports' =>$reports]);
  }
  public function cindex()
  {
    $reports = DB::table('reports')
    ->leftJoin('companies', 'reports.company_id', '=', 'companies.id')
    ->whereNull('driver_id')
    ->where('reports.status', 1)
    ->select('reports.*', 'companies.*', 'reports.id as id')
    ->get();
    return view('admin.reports.clist',['reports' =>$reports]);
  }

  public function submissions_drivers()
  {
    $reports = DB::table('reports')
    ->leftJoin('drivers', 'reports.driver_id', '=', 'drivers.id')
    ->whereNull('reports.company_id')
    ->where('reports.status', 0)
    ->select('reports.*', 'drivers.*', 'reports.id as id')
    ->get();
    return view('admin.reports.list',['reports' =>$reports]);
  }
  public function submissions_companies()
  {
    $reports = DB::table('reports')
    ->leftJoin('companies', 'reports.company_id', '=', 'companies.id')
    ->whereNull('driver_id')
    ->where('reports.status', 0)
    ->select('reports.*', 'companies.*', 'reports.id as id')
    ->get();
    return view('admin.reports.clist',['reports' =>$reports]);
  }

  public function add_new_report(Request $request){
    $data['title']          = $request->input('title');
    $data['severity']       = $request->input('severity');
    $data['issue']          = $request->input('issue');
    $data['cost_involved']  = $request->input('cost_involved');
    $data['heppens']        = $request->input('heppens');
    $data['status'] = $request->input('status');
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
   public function edit_driver_report($id){

    $reports = Reports::find($id);
    $issues = explode(',', $reports->issue);
    $driver = Drivers::find($reports->driver_id);
    return view('admin.reports.edit_driver_report',['reports'=>$reports, 'issues' => $issues,'driver' => $driver]);
  }
  public function edit_company_report($id){

    $reports = Reports::find($id);
    $issues = explode(',', $reports->issue);
    $company = Drivers::find($reports->company_id);
    return view('admin.reports.edit_compnay_report',['reports'=>$reports, 'company' => $company, 'issues' => $issues]);
  }
  public function add_new_report_id(Request $request,$id){

    $issue = implode(",", $request->input('issue'));

    $data['driver_id']      = $request->input('driver_id');
    $data['user_id']        =  Auth::id();
    $data['report_submitted_person']      = Auth::user()->name;
    $data['title']          = $request->input('title');
    $data['severity']       = $request->input('severity');
    $data['issue']          = $issue;
    $data['cost_involved']  = $request->input('cost_involved');
    $data['heppens']        = $request->input('heppens');
    $data['created_at']     = date('Y-m-d H:i:s');
    $data['updated_at']     = date('Y-m-d H:i:s');
    $data['status'] = $request->input('status');
    $inserted = DB::table('reports')->insert($data);
    if($inserted)
    {
      flash('Report Added Successfully')->success();
      return redirect('admin/submissions_reports/drivers');
    }
    else
    {
      flash('Error')->error();
      return redirect('admin/reports/add_report'.$id);
    }
  }
   public function update_driver_report(Request $request){
    $issue = implode(",", $request->input('issue'));
    $id = $request->input('id');
    $data['report_submitted_person']      = Auth::user()->name;
    $data['title']          = $request->input('title');
    $data['severity']       = $request->input('severity');
    $data['issue']          = $issue;
    $data['cost_involved']  = $request->input('cost_involved');
    $data['heppens']        = $request->input('heppens');
    $data['created_at']     = date('Y-m-d H:i:s');
    $data['updated_at']     = date('Y-m-d H:i:s');
    $data['status'] = $request->input('status');

    $update = DB::table('reports')->where('id', $id)->update($data);
    if($update)
    {
      flash('Report updated Successfully')->success();
      return redirect('admin/reports/drivers');
    }
    else
    {
      flash('Error')->error();
      return redirect('admin/driver_report/edit/'.$id);
    }
  }

  public function update_company_report(Request $request){

    $issue = implode(",", $request->input('issue'));
    $id = $request->input('id');
    $data['report_submitted_person']      = Auth::user()->name;
    $data['title']          = $request->input('title');
    $data['severity']       = $request->input('severity');
    $data['issue']          = $issue;
    $data['cost_involved']  = $request->input('cost_involved');
    $data['heppens']        = $request->input('heppens');
    $data['created_at']     = date('Y-m-d H:i:s');
    $data['updated_at']     = date('Y-m-d H:i:s');
    $data['status'] = $request->input('status');

    $update = DB::table('reports')->where('id', $id)->update($data);
    if($update)
    {
      flash('Report updated Successfully')->success();
      return redirect('admin/reports/companies');
    }
    else
    {
      flash('Error')->error();
      return redirect('admin/company_report/edit/'.$id);
    }
  }
  public function add_new_creport_id(Request $request,$id){

    $issue = implode(",", $request->input('issue'));

    $data['company_id']      = $request->input('company_id');
    $data['user_id']      = Auth::id();
    $data['report_submitted_person']      = Auth::user()->name;
    $data['title']          = $request->input('title');
    $data['severity']       = $request->input('severity');
    $data['issue']          = $issue;
    $data['cost_involved']  = $request->input('cost_involved');
    $data['heppens']        = $request->input('heppens');
    $data['created_at']     = date('Y-m-d H:i:s');
    $data['updated_at']     = date('Y-m-d H:i:s');
    $data['status'] = $request->input('status');
    $inserted = DB::table('reports')->insert($data);
    if($inserted)
    {
      flash('Report Added Successfully')->success();
      return redirect('admin/submissions_reports/companies');
    }
    else
    {
      flash('Error')->error();
      return redirect('admin/reports/add_report'.$id);
    }
  }
}
