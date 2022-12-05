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
    public function index(Request $request)
    {
        //$Bicicletas = bicicleta::get();
        $Bicicletas = bicicleta::whereIn('estado_bici', [1, 2, 3])->paginate();
        return view('admin/home_Admin', compact('Bicicletas'));
    }

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
    public function store(Request $request)
    {

        $NewBici = new bicicleta;

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
