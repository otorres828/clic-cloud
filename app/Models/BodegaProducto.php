<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BodegaProducto extends Model
{
    public $timestamps = false;
    protected $guarded = ['id'];
    protected $table = 'bodega_producto';

    public function producto(){
        return $this->belongsTo(Producto::class);
    }

    public function bodega(){
        return $this->belongsTo(Bodega::class);
    }
}
