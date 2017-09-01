<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      if( Auth::guard('admin')->check() ){
        //dd('admin'.' '. Auth::guard('admin')->user()->id);
        $actual_id = Auth::guard('admin')->user()->id;
        $patients = User::searchuser($actual_id)->paginate(5);
        //dd($patients);
        return view('patient.index')->with('patients',$patients);
       //echo Notification::searchnot()->toSql();

      }
    }
}
