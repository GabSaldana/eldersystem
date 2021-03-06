<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use Laracasts\Flash\Flash;
use Auth;
use App\User;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

      if( Auth::guard('web')->check() ){
        //dd('user'.' '. Auth::guard('web')->user()->id);
        $actual_id = Auth::guard('web')->user()->id;
        $name = $request ->name;
        //dd($name);
        $doctors = Admin::searchadmin($actual_id)->search($name)->paginate(5);
        //dd($doctors);
        return view('doctor.index')->with('doctors',$doctors);
       //echo Admin::searchadmin($actual_id)->toSql();

      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('doctor.create');
    }

    public function add(){

          return view('doctor.add');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $this->validate($request, [
            'name'             => 'bail|required|min:3|max:120',
            'email'            => 'bail|required|max:255|email',
            'password'         => 'bail|min:6',
            'telephone_number' => 'bail',
            'photo'            => 'image|bail|required'
            ]);

        /*Manipulación de images*/
        $name = '';
        if($request->file('photo') )
        {
          $file = $request->file('photo');
          $name = 'doctor_' . time() . '.' . $file->getClientOriginalExtension();
          $path =  public_path() . '/images/doctor/';
          $file->move($path, $name);

        }

        $doctor = new Admin($request->all());
        $doctor->password = bcrypt($request->password);
        $name2 = 'images/doctor/'. $name;
        $doctor->photo = $name2;
        //dd($name2);
        $doctor->save();

        flash("Se ha registrado " . $doctor->name)->success()->important();
        return redirect()->route('admin.login');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $doctor = Admin::find($id);
      return view('doctor.show')->with('doctor',$doctor);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $doctor = Admin::find($id);
      return view('doctor.edit')->with('doctor',$doctor);
    }

    public function see($id)
    {

      $doctor = Admin::find($id);
      return view('doctor.see')->with('doctor',$doctor);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
          //dd('update');
          $this->validate($request, [
             'name'             => 'bail|required|min:3|max:120',
             'email'            => 'bail|required|max:255|email',
             'password'         => 'bail|min:6',
             'telephone_number' => 'bail',
             'photo'            => 'bail|required'
           ]);

         $doctor = Admin::find($id);
         $doctor->name = $request->name;
         $doctor->lastname = $request->lastname;
         $doctor->email = $request->email;
         $doctor->age = $request->age;
         $doctor->sex = $request->sex;
         $doctor->specialty = $request->specialty;
         $doctor->schedule = $request->schedule;
         $doctor->telephone_number = $request->telephone_number;
         $doctor->office_address = $request->office_address;

         /*Manipulación de images*/
         $name = '';
         if($request->file('photo') ){

           $file = $request->file('photo');
           $name = 'doctor_' . time() . '.' . $file->getClientOriginalExtension();
           $path =  public_path() . '/images/doctor/';
           $file->move($path, $name);
         }

         $name2 = 'images/doctor/'. $name;
         $doctor->photo = $name2;
         $doctor->save();

         flash('El usuario ' . $doctor->name. ' '. $doctor->lastname.' ha sido editado')->warning()->important();
         return redirect()->route('doctor.index');
    }

    public function updatesee(Request $request, $id)
    {
          //dd('updatesee');
          $this->validate($request, [
             'name'             => 'bail|required|min:3|max:120',
             'email'            => 'bail|required|max:255|email',
             'password'         => 'bail|min:6',
             'telephone_number' => 'bail',
             'photo'            => 'bail|required'
           ]);

         $doctor = Admin::find($id);
         $doctor->name = $request->name;
         $doctor->lastname = $request->lastname;
         $doctor->email = $request->email;
         $doctor->age = $request->age;
         $doctor->sex = $request->sex;
         $doctor->specialty = $request->specialty;
         $doctor->schedule = $request->schedule;
         $doctor->telephone_number = $request->telephone_number;
         $doctor->office_address = $request->office_address;

         /*Manipulación de images*/
         $name = '';
         if($request->file('photo') ){

           $file = $request->file('photo');
           $name = 'doctor_' . time() . '.' . $file->getClientOriginalExtension();
           $path =  public_path() . '/images/doctor/';
           $file->move($path, $name);
         }

         $name2 = 'images/doctor/'. $name;
         $doctor->photo = $name2;
         $doctor->save();

         flash('El usuario ' . $doctor->name. ' '. $doctor->lastname.' ha sido editado')->warning()->important();
         return redirect()->route('patient.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $doctor = Admin::find($id);
      $doctor->delete();

      flash('El usuario '.$doctor->name.' '.$doctor->lastname.' a sido borrado' )->warning()->important();
      return redirect()->route('doctor.index');
    }
}
