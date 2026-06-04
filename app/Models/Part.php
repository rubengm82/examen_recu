<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
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
