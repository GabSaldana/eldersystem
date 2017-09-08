<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Admin;
use App\Node;
use App\Measure;
use Khill\Lavacharts\Lavacharts;
use Laracasts\Flash\Flash;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use Auth;

class PatientController extends Controller
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
        $name= $request->name;
        $argument = $actual_id . '/' . $name ;
        dd($argument);
        $patients = User::searchuser($argument)->paginate(5);
        //dd($patients);
        return view('patient.index')->with('patients',$patients);
       //echo User::searchuser($actual_id)->search($request->name)->toSql();

      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('patient.create');
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
          'mac_address' => 'bail|required',
          'name' => 'bail|required|min:3|max:120',
          'email' => 'bail|required|max:255|email',
          'password' => 'bail|min:6',
          'telephone_number' => 'bail',
          'photo' => 'image|bail|required'
      ]);

      //Se crea el nodo, se le asigna a un doctor y se guarda
      $node = new Node();
      $node->mac_address=$request->mac_address;
      $node->admin_id=Auth::guard('admin')->user()->id;//Auth::id();
      //dd($node);
      $node->save();

      $name='' ;
      if($request->file('photo') )
      {
        $file = $request->file('photo');
        $name = 'patient_' . time() . '.' . $file->getClientOriginalExtension();
        $path =  public_path() . '/images/pacientes/';
        $file->move($path, $name);
      }
      //se crea un paciente y se le asigna el nodo recien creado
      $name2='/images/pacientes/'.$name;
      $patient = new User($request->all());
      $patient->password = bcrypt($request->password);
      $patient->photo  = $name2;
      $patient->node_id=$node->id;
      $patient->save();

      /****LLENANDO TABLA PIVOTE se le asigna ese paciente al medico****/
      if(Auth::guard('admin')->check()){
          //dd(Auth::guard('admin')->user()->id);
          $iddoctor   = Auth::guard('admin')->user()->id;
          $idpaciente = $patient->id;
          DB::insert('insert into admin_user(admin_id, user_id) values (?,?)',
          [$iddoctor,$idpaciente]);
          $doctor_patient = DB::select( DB::raw("SELECT * FROM admin_user") );
          //dd($doctor_patient);
      }

      flash("Se ha registrado " . $patient->name)->success()->important();
      return redirect()->route('patient.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $count = DB::table('user_variable')
      ->where('user_variable.user_id','=',$id)
      ->count();
      if($count!=0){
      for ($i = 1; $i <= $count; $i++){
       if($i==1){
        $lava=new Lavacharts;
        $measure=$lava->DataTable();
        $data = Measure::select('value','time')
        ->join('variables', 'variables.id', '=', 'measures.variable_id')
        ->where('variables.id','=',$i)
        ->get();
        //echo $data;
        //echo "----------------";
        $measure->addStringColumn("Hora")->addNumberColumn("Valor");
        foreach ($data as $key => $value) {
          $measure->addRow([
            $value['time'],$value['value'],
          ]);
        }
        $lava->AreaChart('Medicion1',$measure,[
          'title'=>'1er Variable',
          'legend' => [
            'position' => 'in'
          ]
        ]);
       }
       else{self::areaChart2($lava,$i);}
      }

      $patient = User::find($id);
      return view('patient.show',["lava"=>$lava])->with('patient',$patient)->with('count',$count);
      }
      else{
        $patient = User::find($id);
        return view('patient.show')->with('patient',$patient)->with('count',$count);
      }
    }

    public function meashow($id)
    {
      //$data = User::searchmeasure($id);
      $count = DB::table('user_variable')
      ->where('user_variable.user_id','=',$id)
      ->count();
      for ($i = 1; $i <= $count; $i++){
       if($i==1){
        $lava=new Lavacharts;
        $measure=$lava->DataTable();
        $data = Measure::select('value','time')
        ->join('variables', 'variables.id', '=', 'measures.variable_id')
        ->where('variables.id','=',$i)
        ->get();
        //echo $data;
        //echo "----------------";
        $measure->addStringColumn("Hora")->addNumberColumn("Valor");
        foreach ($data as $key => $value) {
          $measure->addRow([
            $value['time'],$value['value'],
          ]);
        }
        $lava->AreaChart('Medicion1',$measure,[
          'title'=>'1er Variable',
          'legend' => [
            'position' => 'in'
          ]
        ]);
       }
       else{self::areaChart2($lava,$i);}
      }
      return view('measure.show',["lava"=>$lava])->with('count',$count);
    }

    private static function areaChart2($lava,$i){
      $measuration=$lava->DataTable();
      $data = Measure::select('value','time')
      ->join('variables', 'variables.id', '=', 'measures.variable_id')
      ->where('variables.id','=',$i)
      ->get();

      $measuration->addStringColumn("Hora")->addNumberColumn("Valor");
      foreach ($data as $key => $value) {
        $measuration->addRow([
          $value['time'],$value['value'],
        ]);
      }
      $lava->AreaChart('Medicion2',$measuration,[
        'title'=>'2da Variable',
        'legend' => [
          'position' => 'in'
        ]
      ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $patient = User::find($id);
      return view('patient.edit')->with('patient',$patient);
    }

    public function see($id)
    {
      $patient = User::find($id);
      return view('patient.see')->with('patient',$patient);
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
          $this->validate($request, [
              'name' => 'bail|required|min:3|max:120',
              'email' => 'bail|required|max:255|email',
              'password' => 'bail|min:6',
              'telephone_number' => 'bail',
              'photo' => 'bail|required'
          ]);
          $patient = User::find($id);
          $patient->name = $request->name;
          $patient->lastname = $request->lastname;
          $patient->email = $request->email;
          $patient->age = $request->age;
          $patient->sex = $request->sex;
          $patient->height = $request->height;
          $patient->weight = $request->weight;
          $patient->telephone_number = $request->telephone_number;
          $patient->address = $request->address;
          $patient->short_description = $request->short_description;

          $name='' ;

          if($request->file('photo') ){

            $file = $request->file('photo');
            $name = 'patient_' . time() . '.' . $file->getClientOriginalExtension();
            $path =  public_path() . '/images/pacientes/';
            $file->move($path, $name);
          }
          $name2='/images/pacientes/'.$name;

          $patient->photo  = $name2;
          $patient->save();

          flash('El usuario ' . $patient->name. ' '. $patient->lastname.' ha sido editado')->warning()->important();
          return redirect()->route('patient.index');
    }

    public function updatesee(Request $request, $id)
    {
          $this->validate($request, [
              'name' => 'bail|required|min:3|max:120',
              'email' => 'bail|required|max:255|email',
              'password' => 'bail|min:6',
              'telephone_number' => 'bail',
              'photo' => 'bail|required'
          ]);
          $patient = User::find($id);
          $patient->name = $request->name;
          $patient->lastname = $request->lastname;
          $patient->email = $request->email;
          $patient->age = $request->age;
          $patient->sex = $request->sex;
          $patient->height = $request->height;
          $patient->weight = $request->weight;
          $patient->telephone_number = $request->telephone_number;
          $patient->address = $request->address;
          $patient->short_description = $request->short_description;

          $name='' ;

          if($request->file('photo') ){

            $file = $request->file('photo');
            $name = 'patient_' . time() . '.' . $file->getClientOriginalExtension();
            $path =  public_path() . '/images/pacientes/';
            $file->move($path, $name);
          }
          $name2='/images/pacientes/'.$name;

          $patient->photo  = $name2;
          $patient->save();

          flash('El usuario ' . $patient->name. ' '. $patient->lastname.' ha sido editado')->warning()->important();
          return redirect()->route('doctor.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $patient = User::find($id);
      $node = Node::find($patient->node_id);
      $node->delete();
      $patient->delete();


      flash('El usuario '.$patient->name.' '.$patient->lastname.' a sido borrado' )->warning()->important();
      return redirect()->route('patient.index');
    }
}
