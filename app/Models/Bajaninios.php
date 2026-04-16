<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bajaninios extends Model
{
    use HasFactory;

    protected $table = 'bajaninios';

    protected $primaryKey = 'id_baja';

    public $incrementing = true;

    protected $keyType = 'int';

    protected $fillable = [
        'id_ninio',
        'motivo',
        'fecha'
    ];
}