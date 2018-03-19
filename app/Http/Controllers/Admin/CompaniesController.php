<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

use Auth,App\User,App\Companies,DB,File;

class CompaniesController extends Controller
{
  public function __construct(){
      $this->middleware('auth');
  }
  public function index(){
    $companies = Companies::all();
    return view('admin.company.list',['companies' => $companies]);
  }
  public function company_profile($companies_id){

    $data['drivers'] = DB::table('companies')->select('*')->join('drivers','drivers.user_id','=','companies.id')->where(['user_id' => $companies_id])->get();
    $companies = Companies::find($companies_id);
    return view('admin.company.company_profile',$data,['companies'=>$companies]);
  }

  public function add_new_companies(Request $request){

    $data['type']         = $request->input('type');
    $data['license']      = $request->input('license');
    $data['phonenumber']  = $request->input('phonenumber');
    $data['name']         = $request->input('name');
    $data['email']        = $request->input('email');
    $data['address']      = $request->input('address');
    $data['website']      = $request->input('website');
    if($request->hasFile('image')){
      $image = $request->file('image');
      $filename = time() . '.' . $image->getClientOriginalExtension();
      $image->move(public_path() . '/uploads/company/', $filename);
      $data['image']        =  $filename;
    }
    $data['personfname']  = $request->input('personfname');
    $data['personlname']  = $request->input('personlname');
    $data['personphone']  = $request->input('personphone');
    $data['personemail']  = $request->input('personemail');
    $data['membership']   = $request->input('membership');
    $data['startdate']    = date('Y-m-d',strtotime($request->input('startdate')));
    $data['enddate']      = date('Y-m-d',strtotime($request->input('enddate')));

    $inserted = DB::table('companies')->insert($data);
    if($inserted)
    {
      flash('Company Details Inserted Successfully')->success();
        return redirect('admin/companies');
    }
    else
    {
      flash('Error Occured While Creating Company')->error();
        return redirect('admin/companies/add');
    }
  }
  public function add(){
    return view('admin.company.add');
  }
  public function edit($companies_id){
    $companies = Companies::find($companies_id);
    return view('admin.company.edit',['companies' => $companies]);
  }
  public function update(Request $request,$companies_id){

    $companies = Companies::find($companies_id);
    $companies->type        = $request->input('type');
    $companies->license     = $request->input('license');
    $companies->phonenumber = $request->input('phonenumber');
    $companies->name        = $request->input('name');
    $companies->email       = $request->input('email');
    $companies->address     = $request->input('address');
    $companies->website     = $request->input('website');
    $image = $request->file('image');
    $filename = time() . '.' . $image->getClientOriginalExtension();
    $image->move(public_path() . '/uploads/company/', $filename);
    $companies->image       = $filename;
    $companies->personfname = $request->input('personfname');
    $companies->personphone = $request->input('personphone');
    $companies->personlname = $request->input('personlname');
    $companies->personemail = $request->input('personemail');
    $companies->membership  = $request->input('membership');
    $companies->startdate   = $request->input('startdate');
    $companies->enddate     = $request->input('enddate');
    if($companies->save())
    {
      File::Delete(public_path() . '/uploads/company/'.$request->input('old_file'));
      return redirect('admin/companies')->with('alert-success', 'Company Has Been Updated Successfully');
    }
  }
  public function delete($id){
    $companies = Companies::where('id',$id);
    $company_users = User::where('company_id',$id);
    if($companies->delete() && $company_users->delete())
    {
      flash('Record Deleted Successfully')->success();
      return redirect('admin/companies');
    }
    //if($companies->delete())
    else{
      flash('Record Deleted Successfully')->success();
      return redirect('admin/companies');
    }
  }
}
