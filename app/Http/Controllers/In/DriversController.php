<?php

namespace App\Http\Controllers\In;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB,App\Drivers;
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
    $data['name']           = $request->input('name');
    $data['email']          = $request->input('email');
    $data['phonenumber']    = $request->input('phonenumber');
    $data['address']        = $request->input('address');
    $data['joiningdate']    = date('Y-m-d',strtotime($request->input('joiningdate')));

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
    return view('in.drivers.add');
  }
  public function edit($driver_id){
    $driver = Drivers::find($driver_id);
    return view('in.drivers.edit',['driver' => $driver]);
  }
  public function update(Request $request,$driver_id){
    $driver = Drivers::find($driver_id);
    $driver->name = $request->input('name');
    $driver->email = $request->input('email');
    $driver->phonenumber = $request->input('phonenumber');
    $driver->address = $request->input('address');
    $driver->joiningdate = $request->input('joiningdate');
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
