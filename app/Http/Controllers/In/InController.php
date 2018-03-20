<?php

namespace App\Http\Controllers\In;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth,App\User,DB,Hash,File;

class InController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  public function index()
    {
      //$data['total_users'] = User::where('role', 'user')->count();
      // tab latest report
      $data['latest_reports'] = DB::table('reports')
      ->leftJoin('drivers', 'reports.driver_id', '=', 'drivers.id')
      ->whereNull('reports.company_id')
      ->select('*')
      ->limit(3)
      ->orderByRaw('reports.id DESC')
      ->get();
      $data['latest_creports'] = DB::table('reports')
      ->leftJoin('companies', 'reports.company_id', '=', 'companies.id')
      ->whereNull('reports.driver_id')
      ->select('*')
      ->limit(2)
      ->orderByRaw('reports.id DESC')
      ->get();
      //tab driver with most report registered
      $data['driver_most_report_registered'] =   DB::table('reports')
      ->JOIN('drivers', 'reports.driver_id', '=', 'drivers.id')
      //->whereNull('reports.company_id')
      ->select(array('drivers.id as id', 'drivers.fname as name', DB::raw('COUNT(reports.driver_id) as total')))
      ->groupBy(['drivers.id','drivers.fname'])
      ->limit(3)
      ->get();
      $data['total_users']      = DB::table('users')->count();
      $data['total_drivers']    = DB::table('drivers')->count();
      $data['total_companies']  = DB::table('companies')->count();
      return view('in.dashboard',$data);
    }
    public function profile(){
      $user = user::find(Auth::user()->id);
      $data['name'] = $user->name;
      $data['firstname'] = $user->firstname;
      $data['lastname'] = $user->lastname;
      $data['email'] = $user->email;

      return view('in.users.profile',$data);
    }
    public function updateProfile(Request $request)
    {
      $user_id = Auth::user()->id;
      $user = user::find($user_id);
      $user->name = $request->input('name');
      $user->firstname = $request->input('firstname');
      $user->lastname = $request->input('lastname');
      $user->email = $request->input('email');
      if($user->save())
      {
        flash('Profile Updated Successfully')->success();
        return redirect('incompanies/profile');
      }

    }
    public function account(){
      return view('in.users.account');
    }
    public function updatePassword(Request $request){
    if(Auth::Check()){
      $current_password = Auth::User()->password;
      if($request->input('new_password')==$request->input('confirm_new_password')){
         if(Hash::check($request->input('current_password'), $current_password)){
          $user_id = Auth::user()->id;
          $user = user::find($user_id);
          $user->password = Hash::make($request->input('new_password'));
          if($user->save()){
              flash('Password Updated Successfully')->success();
               return redirect('incompanies/account');
              }
            }
            else{
              flash('Please enter correct current password')->error();
              return redirect('incompanies/account');
            }
        }
        else
        {
          flash('New Password and Confirm New Password Does not match')->error();
          return redirect('incompanies/account');
        }
    }
    }
}
