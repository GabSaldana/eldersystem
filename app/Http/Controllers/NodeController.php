<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Node;
use App\Variable;
use App\User;
use Laracasts\Flash\Flash;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Auth;

class NodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      /*if(Auth::guard('admin')->check()){

          dd(Auth::guard('admin')->user());
      }*/
      if( Auth::guard('admin')->check() ){
        $actual_id = Auth::guard('admin')->user()->id;
        $nodes = Node::searchnode($actual_id)->paginate(5);
        //$nodes = Node::orderBy('id','ASC')->paginate(5);
        return view('node.index')->with('nodes',$nodes);
      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('node.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //if(Auth::check()){
        $this->validate($request, [
          'mac_address' => 'bail|required'
        ]);
        $node = new Node($request->all());
        $node->admin_id=1;//Auth::id();
        //dd($node);
        $node->save();

        flash("Se ha creado un nodo")->success()->important();
        return redirect()->route('admin.login');
      //}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $node = Node::find($id);
      return view('node.show')->with('node',$node);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      Session::put('node', $id);
      //$user = User::find($id);
      //return view('node.edit')->with('user',$user);
      if(Auth::guard('admin')->check()){
        $nodes = Node::searchvariable($id)->paginate(5);
      //dd($nodes);
        return view('node.edit')->with('nodes',$nodes);
      //echo Node::searchvariable(1)->toSql();
      }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function add()
     {
       //llenaremos tabla user_variable
       $node_session = Session::get('node');
       //seleccionamos al ususario perteneciente a ese nodo, es para el solo el nodo
       //$patient = User::usernode($node_session)->pluck('name','id');
       $usr_id = User::usernode($node_session)->get();
       $usr_id = $usr_id[0]->id;
       //dd($usr_id);
       $patient=null;
       $variable=null;
       /****** Rebisamos la cantidad de variables asignadas al paciente *********/
        $cantidad = DB::table('user_variable')
        ->select(DB::raw('count(*) as count'))
        ->where('user_id', '=', $usr_id)
        ->get();

        if($cantidad[0]->count == 2){//***********************esta llena
            //echo 'llena ' . $cantidad[0]->count . '</br>';
            flash('El paciente'.' notiene disponibilidad para agregar más variables' )->warning()->important();
            $nodes = Node::searchvariable($node_session)->paginate(5);
            return view('node.edit')->with('nodes',$nodes);
            //no mandar nada al select
        }elseif($cantidad[0]->count == 0){//**********************esta vacia
           //mandar ambas variables al select
           //echo 'espacio para 2 variables</br>';
           $patient = User::usernode($node_session)->pluck('name','id');
           $variable = Variable::orderBy('name','ASC')->pluck('name','id');
        }elseif($cantidad[0]->count == 1){//*****************esta medio llena
            //echo 'total ' . $cantidad[0]->count . '</br>';
            $cantidad_temp = DB::table('user_variable')
            ->select(DB::raw('count(*) as count'))
            ->where('user_id', '=', $usr_id)
            ->where('variable_id', '=' , 1)
            ->get();
            if($cantidad_temp[0]->count == 0){//no tiene variable temperatura
                //echo 'puedes agregar una temp';
                $patient = User::usernode($node_session)->pluck('name','id');
                $variable = Variable::var(1)->pluck('name','id');
            }elseif($cantidad_temp[0]->count == 1){//no puedes agregar mas temp
                //echo 'temp: ' . $cantidad_temp[0]->count . '</br>' ;
            }else{
              //echo 'no puedes tener mas de una temp';
            }
            $cantidad_pul = DB::table('user_variable')
            ->select(DB::raw('count(*) as count'))
            ->where('user_id', '=', $usr_id)
            ->where('variable_id', '=' , 2)
            ->get();
            if($cantidad_pul[0]->count == 0){//no tiene variable pulso
                //echo 'puedes agregar una pul';
                $patient = User::usernode($node_session)->pluck('name','id');
                $variable = Variable::var(2)->pluck('name','id');
            }elseif($cantidad_pul[0]->count == 1){//no puedes agregar mas pul
                //echo 'temp: ' . $cantidad_pul[0]->count . '</br>' ;
            }else{
              //echo 'no puedes tener mas de un pul';
            }

        }else{
          echo 'no vale';
        }
        //dd($variable);
       return view('node.add')->with('patient',$patient)->with('variable',$variable);
     }

    public function update(Request $request)
    {
      /****LLENANDO TABLA PIVOTE****/
      if(Auth::guard('admin')->check()){
          //dd(Auth::guard('admin')->user()->id);
          $idpaciente = $request -> patient_id;
          $idvariable = $request -> variable_id;

          DB::insert('insert into user_variable(user_id, variable_id) values (?,?)',
          [$idpaciente,$idvariable]);
          $patient_variable = DB::select( DB::raw("SELECT * FROM user_variable") );
          //dd($patient_variable);
          $node_session = Session::get('node');
          //dd($node_session);
          $nodes = Node::searchvariable($node_session)->paginate(5);
          return view('node.edit')->with('nodes',$nodes);

      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $node = Node::find($id);
      $patient = User::usernodo($id);
      $patient->delete();
      $node->delete();

      flash('El nodo a sido borrado' )->warning()->important();
      return redirect()->route('node.index');
    }

    public function destroyvar($variable, $user)
    {

      //dd($variable);
      //dd($user);
      $var = Variable::find($variable);
      $usr = User::find($user);

      //dd($usr);
      $usr->variables()->detach($var->id);
      flash('La variable ha sido borrada' )->warning()->important();
      $node_session = Session::get('node');
      //dd($node_session);
      $nodes = Node::searchvariable($node_session)->paginate(5);
      return view('node.edit')->with('nodes',$nodes);
    }
}
