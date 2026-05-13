<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = "projects";
    protected $fillable = [
        "nombre",
        "descripcion",
        "fecha_inicio",
        "fecha_fin",
        "user_id"
    ];

    public function tasks()
    {
        return $this->hasMany(Task::class, 'project_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }
}
