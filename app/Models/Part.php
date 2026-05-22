<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    protected $fillable = [
        'nombre',
    ];

    public function bikes()
    {
        return $this->belongsToMany(Bike::class, 'bike_part');
    }
}
