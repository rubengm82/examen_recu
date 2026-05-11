<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $table = "cars";

    protected $fillable = [
        "name",
        "model",
        "price",
        "owner_id"
    ];

    // Relacion que permite que un coche sea solo de un dueño
    public function owner()
    {
                                              // Se especifica que el campo de la fk se llama owner_id
        return $this->belongsTo(Owner::class, "owner_id");
        /* Relacion de muchos a muchos si un coche puede tener muchos dueños y un dueño puede tener muchos coches
        relaciona la clase owner con car_owner (tabla intermedia de la relacion) con car_id (columna de la tabla pivote que apunta a car) y owner_id (columna de la tabla pivote que apunta a owner) */
        #return $this->belongsToMany(Owner::class, 'car_owner', 'car_id', 'owner_id');
    }
}
