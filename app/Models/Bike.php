<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Override;

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

    public function parts()
    {
        return $this->belongsToMany(Part::class, 'bike_part');
    }

}
