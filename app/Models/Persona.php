<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Persona extends Model
{
    public $timestamps = false;
    protected $table = 'personas';
    protected $primaryKey = 'id_persona';
    protected $fillable = ["nom","ap","am","fecha_nac"];
}
