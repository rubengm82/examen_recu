<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bike extends Model
{
     protected $fillable = [
        'marca',
        'modelo',
        'anyo',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
