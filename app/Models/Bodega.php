<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bodega extends Model
{
    public $timestamps = false;
    protected $guarded = ['id'];

    //muchos a muchos
    public function productos()
    {
        return $this->belongsToMany(Producto::class);
    }
}
