<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bike extends Model
{
    protected $table = 'bikes';
    
    protected $fillable = [
        'marca',
        'modelo',
        'cilindrada',
        'gasolina',
        'user_id',
        'pieza_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function piezas()
    {
        return $this->hasMany(Pieza::class);
    }
}
