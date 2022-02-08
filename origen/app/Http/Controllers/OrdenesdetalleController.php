<?php

namespace App\Http\Controllers;

use App\Models\Ordenesdetalle;
use App\Models\Modelo;
use App\Models\Madera;
use App\Models\Orden;
use Illuminate\Http\Request;

class OrdenesdetalleController extends Controller
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
        $modelos = Modelo::all();
        $maderas = Madera::all();
        
        return view('crearDetalleCuerpo', [
            'modelos' => $modelos,
            'maderas' => $maderas,
            
            
        ]);        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $detalleCuerpo = new Ordenesdetalle();

        // CONSULTAR STOCK, RESTAR y GUARDAR ID de producto
        // SELECT idProducto FROM `productos` WHERE idMadera = 3 and idModelo = 3
        // $productos = Producto::firstWhere($request->id);

        // $detalleCuerpo->idModelo = $request->idModelo;
        // $detalleCuerpo->idMadera = $request->idMadera;

        

        $detalleCuerpo->save();

        return redirect('adminVentas')->with(['mensaje' => 'detalle creado ok']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ordenesdetalle  $ordenesdetalle
     * @return \Illuminate\Http\Response
     */
    public function show(Ordenesdetalle $ordenesdetalle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ordenesdetalle  $ordenesdetalle
     * @return \Illuminate\Http\Response
     */
    public function edit(Ordenesdetalle $ordenesdetalle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ordenesdetalle  $ordenesdetalle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ordenesdetalle $ordenesdetalle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ordenesdetalle  $ordenesdetalle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ordenesdetalle $ordenesdetalle)
    {
        //
    }
}
