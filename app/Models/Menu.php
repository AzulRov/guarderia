<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menus';
    protected $primaryKey = 'id_menu';
    public $timestamps = false;

    protected $fillable = [
        'id_plato',
        'id_ingrediente'
    ];
     public function plato()
    {
        return $this->belongsTo(Plato::class, 'id_plato', 'id_plato');
    }

    public function ingrediente()
    {
        return $this->belongsTo(Ingrediente::class, 'id_ingrediente', 'id_ingrediente');
    }

    public function getRouteKeyName()
    {
        return 'id_menu';
    }
}