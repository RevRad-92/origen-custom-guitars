<?php

namespace App\Http\Controllers;

use App\Models\Ordenesdetalle;
use App\Models\Modelo;
use App\Models\Madera;
use App\Models\Producto;
use App\Models\Orden;
use App\Models\Estado;
use Illuminate\Http\Request;

class OrdenesdetalleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idOrden)
    {
        $orden = Orden::find($idOrden);

        $detalles = Ordenesdetalle::where('idOrden', '=', $idOrden)->with(['getCategoria', 'getProducto', 'getModelo', 'getMadera', 'getEstado'])->paginate(10);
        $estados = Estado::all();
        
        

        return view('orden', [ 
                        'orden' => $orden->idOrden, 
                        'detalles' => $detalles,
                        'estados' => $estados 
                        
                    ]);
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
        $detalleCuerpo->idOrden = $request->idOrden;
        

        if ($this->verificarStock($request)) {
            //modificar stock
            $producto = $this->verificarStock($request);
            $producto->prdStock = ($producto->prdStock) - 1 ;
            $producto->save();
            
        } else {
            dd($this->verificarStock($request));
            // crear producto con stock 0 
            $producto = new Producto();

            $producto->idModelo = $request->idModelo;
            $producto->idMadera = $request->idMadera;
            $producto->prdStock = 0;
            
        }

        $detalleCuerpo->idProducto = $producto->idProducto;
        $detalleCuerpo->idEstado = 1; // los registros de estados no lo modifica el usuario.
        $detalleCuerpo->save();
        
        return redirect('adminVentas')->with(['mensaje' => 'detalle creado ok']);

    }


    private function verificarStock (Request $request)
    {
        $check = Producto::where('idCategoria', '=', $request->idCategoria)
                    ->where('idModelo', '=', $request->idModelo)
                    ->where('idMadera', '=', $request->idMadera)
                    ->first();
        
        if ($check == null ) {
            return false;
        } else {
            
            return $check;
        }
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
