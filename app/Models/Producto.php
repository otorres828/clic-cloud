<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    public $timestamps = false;
    protected $guarded = ['id'];
    
    //muchos a muchos
    public function bodegas()
    {
        return $this->belongsToMany(Bodega::class);
    }

}
