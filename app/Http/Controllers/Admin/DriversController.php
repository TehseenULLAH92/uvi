<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth,App\Drivers,DB,App\Companies;

class DriversController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
  public function index()
  {
    //$drivers = Drivers::where('id',Auth::user()->id);
    $drivers = Drivers::All();
    return view('admin.drivers.list',['drivers' =>$drivers]);
  }
  public function add_new_driver(Request $request){
    $data['fname']           = $request->input('fname');
    $data['lname']           = $request->input('lname');
    $data['license']        = $request->input('license');
    $data['user_id']           = Auth::id();
    $data['submitted_by']   = Auth::user()->name;
    $data['report_amount']    = Auth::id();
    // $data['email']          = $request->input('email');
    // $data['phonenumber']    = $request->input('phonenumber');
    // $data['address']        = $request->input('address');
    // $data['joiningdate']    = date('Y-m-d',strtotime($request->input('joiningdate')));

    $inserted = DB::table('drivers')->insert($data);
    if($inserted)
    {
      return redirect('admin/drivers')->with('alert-success', 'Driver Has Been Inserted Successfully');
    }
    else
    {
      return redirect('admin/drivers/add')->with('alert-error', 'Something whent wrong');
    }
  }
  public function add(){
    return view('admin.drivers.add');
  }

  public function add_company_driver($id) {
        $company = Companies::find($id);
      return view('admin.company.add_driver_to_company',['company'=>$company]);
  }
  public function add_driver_to_company(Request $request) {
    $data['fname']        = $request->input('fname');
      $data['lname']        = $request->input('lname');
      $data['user_id']           = Auth::id();
      $data['license']   = $request->input('license');
      $data['submitted_by']    = Auth::user()->name;
      $data['report_amount']  = Auth::id();
      // $data['phonenumber']       = $request->input('phonenumber');
      // $data['address']        = $request->input('address');
      // $data['joiningdate']    = $request->input('joiningdate');

      $inserted = DB::table('drivers')->insert($data);
      if($inserted)
      {
        flash('User Added Successfully')->success();
          return redirect('admin/companies/profile/' . $request->input('company_id'));
      }
      else
      {
        flash('Error')->error();
          return redirect('admin/drivers/add/' . $request->input('company_id'));
      }
  }
  public function edit($driver_id){
    $driver = Drivers::find($driver_id);
    return view('admin.drivers.edit',['driver' => $driver]);
  }
  public function update(Request $request,$driver_id){
    $driver = Drivers::find($driver_id);
    $driver->fname = $request->input('fname');
    $driver->lname = $request->input('lname');
    $driver->license = $request->input('license');
    $driver->submitted_by = Auth::user()->name;
    $driver->report_amount = Auth::id();
    // $driver->address = $request->input('address');
    // $driver->joiningdate = $request->input('joiningdate');
    if($driver->save())
    {
      return redirect('admin/drivers')->with('alert-success', 'Driver Has Been Updated Successfully');
    }
  }
  public function delete($driver_id){
    $driver = Drivers::find($driver_id);
    if($driver->delete())
    {
      return redirect('admin/drivers')->with('alert-danger', 'Driver Has Been Deleted Successfully');
    }
  }
}
