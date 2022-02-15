<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordenesdetalle extends Model
{
    use HasFactory;
    protected $primaryKey = 'idDetalle';
    public $timestamps = false;
    protected $table = 'ordenesdetalles';

    public function getModelo()
    {
        return $this->belongsTo(
            Modelo::class,
            'idModelo',
            'idModelo'
        );
    }

    public function getProducto()
    {
        return $this->belongsTo(
            Producto::class,
            'idProducto',
            'idProducto'
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

    public function getEstado()
    {
        return $this->belongsTo(
            Estado::class,
            'idEstado',
            'idEstado'
        );
    }


}
