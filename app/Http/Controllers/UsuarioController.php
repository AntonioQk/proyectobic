<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/agregar_user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $NewUsuario = new User();
        $NewUsuario->rol = $request->input('rol');
        $NewUsuario->name = $request->input('nombre');
        $NewUsuario->lastname = $request->input('apellido');
        $NewUsuario->email = $request->input('correo');
        $NewUsuario->password = $request->input('contra');
        $NewUsuario->save();
        if ($request->input('rol') == 1) {
            return redirect()->route('usuario.create');
            //return view('agregar_user')->whit('message', 'store');
        } else if ($request->input('rol') == 2) {
            return redirect()->route('login');
        }
    }
    public function login(Request $request)
    {
        $credentials =  request()->only("email", "password");

        if (Auth::attempt($credentials)) {
            request()->session()->regenerate();
            //return redirect()->route('listaCliente.index');
            return redirect()->route('lista.index');
        }

        return redirect()->route('login');
    }

    public function logout()
    {
        Session::flush();

        Auth::logout();
        return redirect()->route('login');
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
        //
    }
}
