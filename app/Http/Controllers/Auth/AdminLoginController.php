<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{
      public function __construct(){

          $this->middleware('guest:admin', ['except' => ['logout']]);// dejamos pasar personas no logeadas como admin
      }

      public function showLoginForm(){

        return view('auth.admin-login');
      }

        public function login(Request $request){

            //Validate the form data
            $this->validate($request, [
                'email' => 'required|email',
                'password' => 'required|min:6'
            ]);
            //Attempt to log the user in
            if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password],$request->remember)){
              //if success , redirect to their dashboard
                return redirect()->intended(route('admin.dashboard'));
            }
            //if not redirect back to login
            return redirect()->back()->withInput($request->only('email', 'remember'));

      }

      public function logout(){
          Auth::guard('admin')->logout();
          return redirect('/');
      }
}
