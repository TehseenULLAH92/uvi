<?php

namespace App\Http\Controllers\In;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth,DB,App\Drivers,App\Companies;
class DriversController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
  public function index()
  {
    $drivers = Drivers::All();
    return view('in.drivers.list',['drivers' =>$drivers]);
  }
  public function add_new_driver(Request $request){
    $data['company_id']    = $request->input('company_id');
    $data['fname']         = $request->input('fname');
    $data['lname']         = $request->input('lname');
    $data['license']       = $request->input('license');
    $data['user_id']       = Auth::id();
    $data['submitted_by']  = Auth::user()->name;
    $data['report_amount'] = Auth::id();

    $inserted = DB::table('drivers')->insert($data);
    if($inserted)
    {
      flash('Driver Added Successfully')->success();
      return redirect('incompanies/drivers');
    }
    else
    {
      flash('Errors')->error();
      return redirect('incompanies/drivers/add');
    }
  }
  public function add(){
    $data['companies'] = Companies::All();
    return view('in.drivers.add',$data);
  }
  public function edit($driver_id){
    $driver = Drivers::find($driver_id);
    $data['companies'] = Companies::All();

    return view('in.drivers.edit',['driver' => $driver],$data);
  }
  public function update(Request $request,$driver_id){
    $driver = Drivers::find($driver_id);
    $driver->company_id = $request->input('company_id');
    $driver->fname = $request->input('fname');
    $driver->lname = $request->input('lname');
    $driver->license = $request->input('license');
    $driver->submitted_by = Auth::user()->name;
    $driver->report_amount = Auth::id();
    if($driver->save())
    {
      flash('Driver Updated Successfully')->success();
      return redirect('incompanies/drivers');
    }
  }
  public function delete($driver_id){
    $driver = Drivers::find($driver_id);
    if($driver->delete())
    {
      flash('Driver Deleted Successfully')->error();
      return redirect('incompanies/drivers');
    }
  }
}
