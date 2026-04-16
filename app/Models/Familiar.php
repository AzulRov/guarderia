<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Familiar extends Model
{
    protected $table = 'familiares';
    protected $primaryKey = 'id_fam';
    public $timestamps = false;

    protected $fillable = [
        'id_persona',
        'DNI',
        'dir',
        'id_parentezco',
        'id_ninio'
    ];

    public function persona()
    {
        return $this->belongsTo(Persona::class, 'id_persona', 'id_persona');
    }

    public function parentezco()
    {
        return $this->belongsTo(Parentezco::class, 'id_parentezco', 'id_parentezco');
    }

    public function ninio()
    {
        return $this->belongsTo(Ninio::class, 'id_ninio', 'id_ninio');
    }

    public function getRouteKeyName()
    {
        return 'id_fam';
    }
}