<?php

namespace App\Http\Controllers;

use App\Models\Modelo;
use Illuminate\Http\Request;

class ModeloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modelos = Modelo::paginate(5);
        
        return view('adminModelos', [ 'modelos' => $modelos ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/agregarModelo');
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

        $Modelo = new Modelo();

        $Modelo->modNombre = $modNombre = $request->modNombre;

        $Modelo->save();

        return redirect('adminModelos')->with([ 'mensaje' => 'El nuevo modelo ' . $modNombre . ' ha sido agregado con éxito']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Modelo  $modelo
     * @return \Illuminate\Http\Response
     */
    public function show(Modelo $modelo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Modelo  $modelo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Modelo = Modelo::find($id);

        return view('modificarModelo', [ 'Modelo' => $Modelo ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Modelo  $modelo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validarForm($request);

        $Modelo = Modelo::find($request->idModelo);

        $Modelo->idModelo = $request->idModelo;
        $Modelo->modNombre = $modNombre = $request->modNombre;

        $Modelo->save();

        return redirect('adminModelos')->with([ 'mensaje' => 'El modelo ' . $modNombre . ' se ha actualizado con éxito' ]);
    }


    /**
     * Método para validar formulario
     * @param Request $request
     */
    private function validarForm(Request $request) 
    {
        $request->validate(
            [
                'modNombre' => 'required|min: 2|max: 50'
            ],
            [
                'modNombre.required' => 'El modelo debe tener un nombre',
                'modNombre.min' => 'El modelo debe tener al menos dos caracteres de largo',
                'modNombre.max' => 'El modelo debe tener como máximo 50 caracteres de largo',

            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Modelo  $modelo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Modelo $modelo)
    {
        //
    }
}
