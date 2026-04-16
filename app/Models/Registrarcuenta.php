<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegistrarCuenta extends Model
{
    protected $table = 'registro_cuentas';
    protected $primaryKey = 'id_regcuenta';
    public $timestamps = false;

    protected $fillable = [
        'id_fam',
        'cuenta'
    ];

    public function getRouteKeyName()
    {
        return 'id_regcuenta';
    }
}