<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth,\App\User;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    use AuthenticatesUsers {
      logout as performLogout;
  }
    //use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

        protected function authenticated(){
         $id=Auth::id();
         $user = User::find($id);
          if($user->role == 'admin') {
              return redirect('admin/dashboard');
          }
          else if($user->role == 'incompanies'){
          return redirect('incompanies/dashboard');
          }
          else if($user->role == 'cremployees'){
          return redirect('cremployees/dashboard');
          }
          else {
          return redirect('crcompanies/dashboard');
          }
    }
    public function logout(Request $request){
    $id=Auth::id();
    $user = User::find($id);
    $redirect_cus = '/';
    if($user->role == 'admin') {
            $redirect_cus = '/admin/dashboard';
        }
    if($user->role == 'incompanies') {
            $redirect_cus = '/incompanies/dashboard';
        }
    if($user->role == 'cremployees') {
            $redirect_cus = '/cremployees/dashboard';
        }
    if($user->role == 'crcompanies') {
            $redirect_cus = '/crcompanies/dashboard';
        }
    $this->performLogout($request);

    return redirect($redirect_cus);
    }
}
