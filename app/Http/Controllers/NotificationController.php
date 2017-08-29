<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;
use App\User;
use Laracasts\Flash\Flash;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use Auth;


class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(Request $request)
     {

         if( Auth::guard('admin')->check() ){
           //dd('admin'.' '. Auth::guard('admin')->user()->id);

           $actual_id = Auth::guard('admin')->user()->id;

           /*$notifications = DB::table('admins')
           ->join('admin_user', 'admin_user.admin_id', '=', 'admins.id')
           ->join('notifications', 'notifications.user_id', '=', 'admin_user.user_id')
           ->join('users', 'users.id', '=', 'admin_user.user_id')
           //->select('admin_user.user_id as patient','admin_user.admin_id as doctor','users.name','notifications.id as notification_id',
           //'notifications.description as description')
           ->where('admins.id', '=', $actual_id)
           ->select('notifications.id','notifications.type','notifications.description')
           ->orderBy('notifications.id','ASC')
           ->get();*/
           $notifications = Notification::searchnotadmin($actual_id)->paginate(5);
           //dd($notifications);
           return view('notification.index')->with('notifications',$notifications);
           //echo Notification::searchnot()->toSql();

         }else{
           //dd('user'.' '. Auth::guard('web')->user()->id);
           $actual_id = Auth::guard('web')->user()->id;
           //echo Notification::searchnotuser(1)->toSql();
           $notifications = Notification::searchnotuser($actual_id)->paginate(5);
           //dd($notifications);
           return view('notification.index')->with('notifications',$notifications);
         }

     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $patient = User::orderBy('name','ASC')->pluck('name','id');

      return view('notification.create')->with('patient',$patient);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      //dd($request);
      $this->validate($request, [
          'type' => 'bail|required',
          'description' => 'bail|required'
      ]);
      $notification = new Notification($request->all());
      $notification -> user_id = $request->patient_id;
      //$notification -> patient_id = \Auth::user()->id;
      $notification->save();

      flash("Se ha creado una notificación")->success()->important();
      return redirect()->route('notification.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $notification = Notification::find($id);
      return view('notification.show')->with('notification',$notification);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $notification = Notification::find($id);
      $notification->delete();

      flash('La notificación '.$notification->id.' a sido borrada' )->warning()->important();
      return redirect()->route('notification.index');
    }
}
