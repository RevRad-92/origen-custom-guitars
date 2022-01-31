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
}
