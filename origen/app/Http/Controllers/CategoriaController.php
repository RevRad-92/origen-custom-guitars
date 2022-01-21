<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::paginate(5);

        return view('adminCategorias', [ 'categorias' => $categorias ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('agregarCategoria');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validar
        $this->validarForm($request);
        // crear
        $Categoria = new Categoria();
        // asignar 
        $Categoria->catNombre = $catNombre = $request->catNombre;
        // guardar
        $Categoria->save();
        // retornar vista
        return redirect('adminCategorias')
                    ->with([ 'mensaje' => 'Categoría ' . $catNombre . ' agregada com éxito']);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Categoria = Categoria::find($id);    

        return view('modificarCategoria', [ 'Categoria' => $Categoria ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // validar
        $this->validarForm($request);
        // obtener categoria
        $Categoria = Categoria::find($request->idCategoria);
        // asignar
        $Categoria->idCategoria = $request->idCategoria;
        $Categoria->catNombre = $request->catNombre;
        // guardar
        $Categoria->save();
        // redirección
        return redirect('adminCategorias')->with([ 'mensaje' => 'Categoría modificada correctamente']);
    }

    /**
     * Método para validar formulario
     * @param Request $request
     */
    private function validarForm(Request $request) 
    {
        $request->validate(
            [
                'catNombre' => 'required|min: 2|max: 50'
            ],
            [
                'catNombre.required' => 'La categoría debe tener un nombre',
                'catNombre.min' => 'La categoría debe tener al menos dos caracteres de largo',
                'catNombre.max' => 'La categoría debe tener como máximo 50 caracteres de largo',

            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoria $categoria)
    {
        //
    }
}
