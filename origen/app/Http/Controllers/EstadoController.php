<?php

namespace App\Http\Controllers;

use App\Models\Ordenesdetalle;
use Illuminate\Http\Request;

class EstadoController extends Controller
{
    public function actualizarEstado($idOrden)
    {
        $orden = Ordenesdetalle::find($idOrden);
        return redirect(`orden/$orden->idOrden`, ['orden' => $orden->idOrden ]);
    }   
}
