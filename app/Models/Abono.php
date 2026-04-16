<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abono extends Model
{
    use HasFactory;

    protected $table = 'abonos';
    protected $primaryKey = 'id_abono';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id_abono',
        'cantidad',
        'fecha',
        'id_regcuenta'
    ];
}