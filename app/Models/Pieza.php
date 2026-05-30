<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pieza extends Model
{
    protected $table = 'piezas';
    
    protected $fillable = [
        'nombre',
        'precio',
        'bike_id',
    ];

    public function bike()
    {
        return $this->belongsTo(Bike::class);
    }
}
