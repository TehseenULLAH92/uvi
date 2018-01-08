<?php

namespace App\Http\Controllers\Cr;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth,App\User,DB,App\Companies,Hash,File;

class UserController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
  public function index()
  {
    $users = User::where('role','cremployees')->get();
    return view('cr.users.list',['users' =>$users]);
  }
  public function add_new_user(Request $request){
    $data['name']        = $request->input('name');
    $data['firstname']   = $request->input('firstname');
    $data['lastname']    = $request->input('lastname');
    $data['company_id']    = $request->input('company_id');
    $data['email']       = $request->input('email');
    $data['role']        = $request->input('role');
    $data['password']    = bcrypt($request->input('password'));

    $inserted = DB::table('users')->insert($data);
    if($inserted)
    {
      flash('User Added Successfully')->success();
      return redirect('crcompanies/users');
    }
    else
    {
      flash('Error')->error();
      return redirect('crcompanies/users/add');
    }
  }
  public function add_user_to_company_view($id){
    $companies = Companies::where('company_id',$id);
    $company_id = $companies->id;
    print_r($company_id);die;
    return view('admin.users.add',['companies' => $companies]);
  }
  public function add_user_to_company(Request $request, $id){
    $data['name']        = $request->input('name');
    $data['firstname']   = $request->input('firstname');
    $data['lastname']    = $request->input('lastname');
    $data['company_id']  = $id;   //$request->input('company_id');
    $data['email']       = $request->input('email');
    $data['role']        = $request->input('role');
    $data['password']    = bcrypt($request->input('password'));

    $inserted = DB::table('users')->insert($data);
    if($inserted)
    {
      flash('User Added Successfully')->success();
        return redirect('admin/users');
    }
    else
    {
      flash('Error')->error();
        return redirect('admin/users/add');
    }
  }
  public function add(){
    $companies = Companies::all();
    return view('cr.users.add',['companies'=>$companies]);
  }
  public function profile(){
    $user = user::find(Auth::user()->id);
    $data['name'] = $user->name;
    $data['firstname'] = $user->firstname;
    $data['lastname'] = $user->lastname;
    $data['email'] = $user->email;

    return view('cr.users.profile',$data);
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
      return redirect('crcompanies/profile');
    }

  }
  public function account(){
    return view('cr.users.account');
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
             return redirect('crcompanies/account');
            }
          }
          else{
            flash('Please enter correct current password')->error();
            return redirect('crcompanies/account');
          }
      }
      else
      {
        flash('New Password and Confirm New Password Does not match')->error();
        return redirect('crcompanies/account');
      }
  }
  }
}
