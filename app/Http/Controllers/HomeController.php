<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;

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
      $doctors = Admin::search($request->name)->orderBy('id','ASC')->paginate(5);
      return view('doctor.index')->with('doctors',$doctors);
    }
}
