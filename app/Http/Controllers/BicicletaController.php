<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bicicleta;
use Illuminate\Support\Facades\File;

class BicicletaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //FUNCION PRINCIPAL(MUESTRA TODAS LAS BICICLETAS)
    public function index(Request $request)
    {
        //$Bicicletas = bicicleta::get();
        $Bicicletas = bicicleta::whereIn('estado_bici', [1, 2, 3])->paginate();
        return view('admin/home_Admin', compact('Bicicletas'));
    }
    //FUNCION DEL PRIMER FILTRO(MUESTRA SOLO LAS BICICLETAS DISPONIBLE)
    public function index_dispo(Request $request)
    {
        //$Bicicletas = bicicleta::get();
        $Bicicletas = bicicleta::whereIn('estado_bici', [1])->paginate();
        return view('admin/home_Admin', compact('Bicicletas'));
    }
    //FUNCION DEL SEGUNDO FILTRO(MUESTRA SOLO LAS BICICLETAS OCUPADAS)
    public function index_ocu(Request $request)
    {
        //$Bicicletas = bicicleta::get();
        $Bicicletas = bicicleta::whereIn('estado_bici', [2])->paginate();
        return view('admin/home_Admin', compact('Bicicletas'));
    }
    //FUNCION DEL TERCER FILTRO(MUESTRA SOLO LAS BICICLETAS QUE ESTAN FUERA DE SERVICIO)
    public function index_fuera(Request $request)
    {
        //$Bicicletas = bicicleta::get();
        $Bicicletas = bicicleta::whereIn('estado_bici', [3])->paginate();
        return view('admin/home_Admin', compact('Bicicletas'));
    }
    //INDEX 2 (MUESTRA TODAS LAS BICICLETAS AL CLIENTE)
    public function index2(Request $request)
    {
        //$Bicicletas = bicicleta::get();
        $Bicicletas = bicicleta::where('estado_bici', 'like', 1)->paginate();
        return view('cliente/home_cliente', compact('Bicicletas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //RETORNA LA VISTA DEL FORMULARIO EN DONDE SE CREA UNA NUEVA BICICLETA
    public function create()
    {
        return view('admin/agregar_bici');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //FUNCION QUE GUARDA LOS DATOS DEL FORMULARIO DE NUEVA BICICLETA EN LA BASE DE DATOS
    public function store(Request $request)
    {

        $NewBici = new bicicleta;

        //SE CAPTURAN LOS DATOS DE LA IMAGEN Y SE GUARDA
        //dd($request->hasFile('img_bici'));
        if ($request->hasFile('img_bici')) {
            $file = $request->file('img_bici');
            $destinationPath = 'img/bicicletas/';
            $filename = time() . '-' . $file->getClientOriginalName();
            $file->move($destinationPath, $filename);
            $NewBici->img_bici = $destinationPath . $filename;
        }
        /*
        */


        $NewBici->marca = $request->input('marca');
        $NewBici->tipo = $request->input('tipo');
        $NewBici->descripcion = $request->input('descrip');
        $NewBici->save();
        return redirect()->route('lista.index');
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
    //FUNCION QUE ME CAPTURA Y ACTUALIZA DATOS DE LAS BICICLETAS
    public function update(Request $request, $id)
    {

        $bicicletas = bicicleta::findOrFail($id);

        if ($request->hasFile('img_bici_update')) {
            $file = $request->file('img_bici_update');
            $destinationPath = 'img/bicicletas/';
            $filename = time() . '-' . $file->getClientOriginalName();
            $file->move($destinationPath, $filename);
            $bicicletas->img_bici = $destinationPath . $filename;
        }


        $bicicletas->estado_bici = $request->input('estado_update');
        $bicicletas->marca = $request->input('marca_update');
        $bicicletas->tipo = $request->input('tipo_update');
        $bicicletas->descripcion = $request->input('descripcion_update');
        $bicicletas->save();
        return redirect()->route('lista.index');
    }
    public function eliminar(Request $request, $id)
    {
        $bicicletas = bicicleta::findOrFail($id);

        $bicicletas->estado_bici = '3';
        $bicicletas->save();
        return redirect()->route('lista.index');
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
