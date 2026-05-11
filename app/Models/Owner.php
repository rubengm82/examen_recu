<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    protected $table = "owners";
    protected $fillable = [
        "name",
        "dni",
        "money"
    ];

    // Relacion que permite a un dueño tener muchos coches
    public function cars()
    {
        return $this->hasMany(Car::class, 'owner_id', 'id');

        // Busca los cars donde cars.owner_id coincida con owners.id
        #return $this->hasMany(Car::class, "owner_id");

    }
}
