<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegistroComida extends Model
{
    protected $table = 'registro_comidas';
    protected $primaryKey = 'id_registrocomida';

    protected $fillable = [
        'id_ninio',
        'id_plato',
        'fecha',
        'cantidad'
    ];

    public $timestamps = false;
}