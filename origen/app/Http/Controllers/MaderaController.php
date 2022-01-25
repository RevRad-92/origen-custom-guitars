<?php

namespace App\Http\Controllers;

use App\Models\Madera;
use Illuminate\Http\Request;

class MaderaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $maderas = Madera::paginate(5);

        return view('adminMaderas', [ 'maderas' => $maderas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return view('agregarMadera');
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

        $Madera = new Madera();

        $Madera->idMadera = $request->idMadera;
        $Madera->madNombre = $madNombre = $request->madNombre;

        $Madera->save();

        return redirect('adminMaderas',  [ 'mensaje' => 'La madera ' . $madNombre . ' fue creada exitosamente']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Madera  $madera
     * @return \Illuminate\Http\Response
     */
    public function show(Madera $madera)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Madera  $madera
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Madera = Madera::find($id);

        return view('modificarMadera', [ 'Madera' => $Madera ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Madera  $madera
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Madera $madera)
    {
        $this->validarForm($request);
        $Madera = Madera::find($request->idMadera);
        $Madera->idMadera = $request->idMadera;
        $Madera->madNombre = $madNombre = $request->madNombre;
        $Madera->save();
        return redirect('adminMaderas')->with([ 'mensaje' => 'La madera ha sido actualizada']);
    }

    /**
     * Método para validar formulario
     * @param Request $request
     */
    private function validarForm(Request $request)
    {
        $request->validate(
            [
                'madNombre' => 'required|min: 2|max: 50'
            ],
            [
                'madNombre.required' => 'El nombre de la madera es obligatorio',
                'madNombre.min' => 'El nombre de la madera debe contener al menos 2 caracteres',
                'madNombre.max' => 'El nombre de la madera debe contener como máximo 50 caracteres'
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Madera  $madera
     * @return \Illuminate\Http\Response
     */
    public function destroy(Madera $madera)
    {
        //
    }
}
