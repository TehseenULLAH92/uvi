<?php

namespace App\Http\Controllers\cre;

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
    return view('cre.drivers.list',['drivers' =>$drivers]);
  }
  public function viewed(Request $request){
    $data['visited_user_id']  = $request->input('viewed');
    $data['vieweddate']       = date('Y-m-d',strtotime());

    $inserted = DB::table('logs')->insert($data);
    if($inserted)
    {
      flash('logs Added Successfully')->success();
      return redirect('cremployees/drivers');
    }
    else
    {
      flash('Errors')->error();
      return redirect('cremployees/drivers/add');
    }
  }
  public function add_new_driver(Request $request){
    $data['name']           = $request->input('name');
    $data['license']        = $request->input('license');
    $data['email']          = $request->input('email');
    $data['phonenumber']    = $request->input('phonenumber');
    $data['address']        = $request->input('address');
    $data['joiningdate']    = date('Y-m-d',strtotime($request->input('joiningdate')));

    $inserted = DB::table('drivers')->insert($data);
    if($inserted)
    {
      flash('Driver Added Successfully')->success();
      return redirect('cremployees/drivers');
    }
    else
    {
      flash('Errors')->error();
      return redirect('cremployees/drivers/add');
    }
  }
  public function add(){
    return view('cre.drivers.add');
  }
  public function edit($driver_id){
    $driver = Drivers::find($driver_id);
    return view('cre.drivers.edit',['driver' => $driver]);
  }
  public function view($driver_id){
    $driver = Drivers::find($driver_id);
    return view('cre.drivers.driver_profile',['driver' => $driver]);
  }
  public function update(Request $request,$driver_id){
    $driver = Drivers::find($driver_id);
    $driver->name = $request->input('name');
    $driver->license = $request->input('license');
    $driver->email = $request->input('email');
    $driver->phonenumber = $request->input('phonenumber');
    $driver->address = $request->input('address');
    $driver->joiningdate = $request->input('joiningdate');
    if($driver->save())
    {
      flash('Driver Added Successfully')->success();
      return redirect('cremployees/drivers');
    }
  }
  public function delete($driver_id){
    $driver = Drivers::find($driver_id);
    if($driver->delete())
    {
      flash('Driver Deleted Successfully')->success();
      return redirect('cremployees/drivers');
    }
  }
}
