<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    use HasFactory;
    protected $table = 'ordenes';
    protected $primaryKey = 'idOrden';
    public $timestamps = false;

    public function getCliente()
    {
        return $this->belongsTo(
            Cliente::class,
            'idCliente',
            'idCliente'
        );
    }

    public function getFormaPago()
    {
        return $this->belongsTo(
            Pago::class,
            'idFormaPago',
            'idFormaPago'
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
