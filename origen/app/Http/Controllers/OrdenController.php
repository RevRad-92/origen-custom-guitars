<?php

namespace App\Http\Controllers;

use App\Models\Modelo;
use App\Models\Madera;
use App\Models\Orden;
use App\Models\Ordenesdetalle;
use App\Models\Pago;
use Illuminate\Http\Request;

class OrdenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ordenes = Orden::with(['getCliente', 'getFormaPago', 'getEstado'])->paginate(10);
        // dd($ordenes);
        return view('adminVentas', ['ordenes'=>$ordenes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pagos = Pago::all();
        $modelos = Modelo::all();
        $maderas = Madera::all();

        return view('generarOrden', 
                    [ 
                        'pagos'     => $pagos,
                        'modelos'   => $modelos,
                        'maderas'   => $maderas
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
        //falta validar, porque es para desarrollo
        $orden = new Orden();

        date_default_timezone_set('America/Argentina/Buenos_Aires');
        $date = date('Y-m-d H:i:s');

        $orden->idOrden = $idOrden = $request->idOrden;
        $orden->idFormaPago = $idFormaPago = $request->idFormaPago;
        $orden->ordComentarios = $ordComentarios = $request->ordComentarios;
        $orden->idCliente = $idCliente = $request->idCliente;
        $orden->ordFecha = $date;
        $orden->idEstado = $idEstado = $request->idEstado;
        

        $orden->save();

        // crear DETALLE de Orden: TRAITS ? 
        

        return redirect('adminVentas')->with(['mensaje' => 'Orden de compra generada' . '' . '!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Orden  $orden
     * @return \Illuminate\Http\Response
     */
    public function show(Orden $orden)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Orden  $orden
     * @return \Illuminate\Http\Response
     */
    public function edit(Orden $orden)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Orden  $orden
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Orden $orden)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Orden  $orden
     * @return \Illuminate\Http\Response
     */
    public function destroy(Orden $orden)
    {
        //
    }
}
