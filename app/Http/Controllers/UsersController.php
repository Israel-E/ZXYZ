<?php

namespace App\Http\Controllers;

use App\estados;
use App\Role;
use App\unidad;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Routing\Redirector;
//use Illuminate\Validation\Validator;
use Validator;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::filterAndPaginate($request->get('nombres'));
        //dd($users);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidad = unidad::lists('unidad', 'id');
        $unidades = array('' => '--- Seleccione Una Unidad ---') + $unidad->all();
        $roles = Role::all();
        //dd($roles);
        return view('users.create', compact('unidades', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Redirector $redirect)
    {
        $data = $request->all();
        $rules = array(
            'nombre'    => 'required',
            'apellidoM' => 'required',
            'ci'        => 'required|unique:users,ci',
            'email'     => 'required|E-Mail',
            'password'  => 'required',
            'unidades'  => 'required',
            'roles'     => 'required'
        );

        $v = Validator::make($data, $rules);
        if($v->fails())
        {
            return redirect()->back()
                ->withErrors($v->errors())
                ->withInput($request->except('password'));
        }

        $user = new User();
        $user->nombre = $data['nombre'];
        $user->apellidoP = $data['apellidoP'];
        $user->apellidoM = $data['apellidoM'];
        $user->ci = $data['ci'];
        $user->email = $data['email'];
        $user->password = \Hash::make($data['password']);
        $user->id_estado = 2; //Deshabilitado
        $user->id_unidad = $data['unidades'];
        $user->save();
        $id_user = $user->id;
        if($request->get('roles') != null)
        {
            $user->InsertarRoles($id_user, $data['roles']);
        }

        return $redirect->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //dd('hols');
        //dd($id);
        $user = User::findOrFail($id);
        $user_roles = \DB::table('role_user')
            ->where('role_user.user_id', '=', $user->id)
            ->join('roles', 'role_user.role_id', '=', 'roles.id')
            ->lists('roles.name');
        $unidad = unidad::lists('unidad', 'id');
        $unidades = array('' => '--- Seleccione Una Unidad ---') + $unidad->all();
        $roles = Role::all();
        //dd($roles);
        $estados = estados::lists('nombre', 'id');
        //dd($estados);
        return view('users.edit', compact('user','unidades', 'roles', 'user_roles', 'estados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, Redirector $redirect)
    {
        //dd($id);
        $data = $request->all();
        $rules = array(
            'nombre'    => 'required',
            'apellidoM' => 'required',
            'ci'        => 'required|unique:users,ci,'.$id,
            'email'     => 'required|E-Mail',
            'password'  => '',
            'unidades'  => 'required',
            'estados'   => 'required',
            'roles'     => 'required'
        );
        $v = Validator::make($data, $rules);
        if($v->fails())
        {
            return redirect()->back()
                ->withErrors($v->errors())
                ->withInput($request->except('password'));
        }

        $user = User::findOrFail($id);
        $user->nombre    = $data['nombre'];
        $user->apellidoP = $data['apellidoP'];
        $user->apellidoM = $data['apellidoM'];
        $user->ci        = $data['ci'];
        $user->email     = $data['email'];
        $user->id_estado = $data['estados'];
        $user->id_unidad = $data['unidades'];
        $user->save();
        $id_user = $user->id;
        if($request->get('roles') != null)
        {
            $user->EditarRoles($id_user, $data['roles']);
        }

        return $redirect->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function setDeshabilitar(Request $request, $id, Redirector $redirect)
    {
        $user = User::findOrFail($id);
        //dd($user);
        $user->id_estado = 2;
        $user->save();
        return $redirect->route('admin.users.index');
    }

    public function setHabilitar($id, Redirector $redirect)
    {
        $user = User::findOrFail($id);
        $user->id_estado = 1;
        $user->save();
        return $redirect->route('admin.users.index');
    }
}
