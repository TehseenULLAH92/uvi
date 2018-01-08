<?php

namespace App\Http\Controllers\Admin;

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
      $users = User::all();
      return view('admin.users.list',['users' => $users]);
    }
    public function add_new_user(Request $request){

      $data['name']        = $request->input('name');
      $data['firstname']   = $request->input('firstname');
      $data['lastname']    = $request->input('lastname');
      $data['company_id']  = $request->input('company_id');
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
    // public function add_user($companies_id){
    //   $company = Companies::find($companies_id);
    //   print_r($company);die;
    //   return view('admin.users.add',['company'=>$company]);
    // }
    public function add(){
      $data['companies'] = Companies::all();
      return view('admin.users.add',$data);
    }
    public function add_user_to_company_view($id){
      $company = Companies::find($id);
      //echo "<pre>";print_r($company);die;
      $companies = DB::table('companies')
      ->select('*')
      ->where('companies.id',$id)
      ->get();
      return view('admin.users.add_user_to_company',['companies' => $companies,'company'=>$company]);
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
    public function edit($user_id){
      $user = User::find($user_id);
      return view('admin.users.edit',['user' => $user]);
    }
    public function update(Request $request,$user_id){
      $user = User::find($user_id);
      $user->name     = $request->input('name');
      $user->email    = $request->input('email');
      $user->role     = $request->input('role');
      $user->firstname= $request->input('firstname');
      $user->lastname = $request->input('lastname');
      $user->role     = $request->input('role');
      $user->company_id     = $request->input('company_id');
      if($user->save())
      {
        flash('User Has Been Updated Successfully')->success();
        return redirect('admin/users');
      }
    }
  public function delete($user_id){
    $user = User::find($user_id);
    if($user->delete())
    {
      flash('User Has Been Deleted Successfully')->error();
      return redirect('admin/users');
    }
  }

  public function profile(){

    $user = user::find(Auth::user()->id);
    $data['name'] = $user->name;
    $data['firstname'] = $user->firstname;
    $data['lastname'] = $user->lastname;
    $data['email'] = $user->email;

    return view('admin.users.profile',$data);
  }
  public function updateProfile(Request $request){
    $user_id = Auth::user()->id;
    $user = user::find($user_id);
    $user->name = $request->input('name');
    $user->firstname = $request->input('firstname');
    $user->lastname = $request->input('lastname');
    $user->email = $request->input('email');
    if($user->save())
    {
      flash('Profile Updated Successfully')->success();
        return redirect('admin/profile');
    }

  }
  public function account(){
    return view('admin.users.account');
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
             return redirect('admin/account');
            }
          }
          else{
            flash('Please enter correct current password')->error();
            return redirect('admin/account');
          }
      }
      else
      {
        flash('New Password and Confirm New Password Does not match')->error();
        return redirect('admin/account');
      }
  }
  }
}
