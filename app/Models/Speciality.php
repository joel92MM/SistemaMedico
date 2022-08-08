<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
    use HasFactory;
    public function users(){
        // relacion de muchos a muchos, un dentista puede tener muchas especialidades
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
