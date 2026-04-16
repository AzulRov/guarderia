<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Centro extends Model
{
    protected $table = 'centros';
    protected $primaryKey = 'id_centro';
    public $timestamps = false;

    protected $fillable = [
        'nom',
        'costo'
    ];
}