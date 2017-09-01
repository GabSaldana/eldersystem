<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Node;
use App\Variable;
use App\User;
use Laracasts\Flash\Flash;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
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
      $nodes = Node::orderBy('id','ASC')->paginate(5);
      return view('node.index')->with('nodes',$nodes);
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
      //$user = User::find($id);
      //return view('node.edit')->with('user',$user);

      $nodes = Node::searchvariable(1)->paginate(5);
      dd($nodes);
      //return view('node.edit')->with('nodes',$nodes);
      //echo Node::searchvariable(1)->toSql();
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
       $patient = User::orderBy('name','ASC')->pluck('name','id');
       $variable = Variable::orderBy('name','ASC')->pluck('name','id');
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
          //return view();
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
      $node->delete();

      flash('El nodo a sido borrado' )->warning()->important();
      return redirect()->route('node.index');
    }
}
