<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      if( Auth::guard('web')->check() ){
        //dd('user'.' '. Auth::guard('web')->user()->id);
        $actual_id = Auth::guard('web')->user()->id;
        $name= $request->name;
        $argument = $actual_id . '/' . $name ;
        dd($argument);
        $doctors = Admin::searchadmin($argument)->paginate(5);
        //dd($doctors);
        return view('doctor.index')->with('doctors',$doctors);
       //echo Admin::searchadmin($actual_id)->toSql();

      }
    }
}
