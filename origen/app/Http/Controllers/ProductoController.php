<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Madera;
use App\Models\Modelo;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // obtener listado de productos
        $productos = Producto::with(['getModelo', 'getCategoria', 'getMadera'])->paginate(10);
        
        return view('adminProductos', [ 'productos' => $productos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        $modelos = Modelo::all();
        $maderas = Madera::all();

        return view('agregarProducto', 
                            [
                                'categorias' => $categorias,
                                'modelos' => $modelos,
                                'maderas' => $maderas
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
        $this->validarForm($request);
        
        $Producto = new Producto();

        if ($this->verificarRegistro($request)) {  

            $Producto->idCategoria = $request->idCategoria;
            $Producto->idModelo = $request->idModelo;
            $Producto->idMadera = $request->idMadera;
            $Producto->prdStock = $request->prdStock;
            $Producto->prdPrecio = $request->prdPrecio;
            $Producto->prdDetalles = $request->prdDetalles;
        
            $Producto->save();
        
            return redirect('adminProductos')
                            ->with([ 'mensaje' => 'Producto agregado correctamente' ]);

        } else {

            return redirect('adminProductos')
                        ->with([
                            'mensaje' => 'El producto que intentas agregar ya existe',
                            'alert' => 'danger' 
                        ]);

            }
    }
    

    private function verificarRegistro (Request $request)
    {
        $check = Producto::where('idCategoria', '=', $request->idCategoria)
                    ->where('idModelo', '=', $request->idModelo)
                    ->where('idMadera', '=', $request->idMadera)
                    ->first();

        if ($check == null ) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $producto = Producto::find($id);
        $categorias = Categoria::all();
        $modelos = Modelo::all();
        $maderas = Madera::all();
        

        return view('modificarProducto', 
                                        [ 
                                            'producto'  => $producto,
                                            'categorias' => $categorias,
                                            'modelos' => $modelos,
                                            'maderas' => $maderas
                                        ]
                        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // validar
        $this->validarForm($request);

        // obtener producto
        $Producto = Producto::find($request->idProducto);

        // validar cambios
        if ($this->verificarRegistro($request)) {  

            $Producto->idCategoria = $request->idCategoria;
            $Producto->idModelo = $request->idModelo;
            $Producto->idMadera = $request->idMadera;
            $Producto->prdStock = $request->prdStock;
            $Producto->prdPrecio = $request->prdPrecio;
            $Producto->prdDetalles = $request->prdDetalles;
        
            $Producto->save();
        
            return redirect('adminProductos')
                            ->with([ 'mensaje' => 'Producto modificado con ??xito' ]);

        } elseif ($Producto->prdStock !== $request->prdStock
                    || $Producto->prdPrecio !== $request->prdPrecio
                    || $Producto->prdDetalles !== $request->prdDetalles ) {
            
            $Producto->prdStock = $request->prdStock;
            $Producto->prdPrecio = $request->prdPrecio;
            $Producto->prdDetalles = $request->prdDetalles;
            $Producto->save();

            return redirect('adminProductos')
                        ->with([ 'mensaje' => 'Caracter??sticas del producto modificadas con ??xito' ]);

        } else {

            return redirect('adminProductos')
                        ->with([
                            'mensaje' => 'El producto que intentas agregar ya existe',
                            'alert' => 'danger' 
                        ]);

            }

    }

    /**
     * M??todo para validar formulario
     * @param Request $request
     */
    private function validarForm(Request $request) 
    {
        $request->validate(
            [
                'idCategoria' => 'required',
                'idModelo' => 'required',
                'idMadera' => 'required',
                'prdStock' => 'required|integer|min:0',
                'prdPrecio' => 'numeric|min:0',
            ], 
            [
                'idCategoria.required' => 'El producto debe tener una categor??a',
                'idModelo.required' => 'El producto debe tener un modelo',
                'idMadera.required' => 'El producto debe tener una madera asignada',
                'prdStock.required' => 'El producto debe tener un stock asignado',
                'prdStock.integer' => 'El producto debe tener un stock num??rico',
                'prdStock.integer' => 'El stock del producto debe ser num??rico',
                'prdPrecio.numeric' => 'El precio del producto debe ser num??rico',
                'prdPrecio.min' => 'El precio del producto debe ser mayor a cero',
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        //
    }
}
