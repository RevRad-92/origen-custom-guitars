<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $primaryKey = 'idProducto';
    public $timestamps = false;

    ## METODOS DE RELACION
    public function getModelo()
    {
        return $this->belongsTo(
            Modelo::class,
            'idModelo',
            'idModelo'
        );
    }

    public function getCategoria()
    {
        return $this->belongsTo(
            Categoria::class,
            'idCategoria',
            'idCategoria'
        );
    }

    public function getMadera()
    {
        return $this->belongsTo(
            Madera::class,
            'idMadera',
            'idMadera'
        );
    }

}
