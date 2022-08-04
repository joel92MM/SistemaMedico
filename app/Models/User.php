<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use App\Models\Speciality;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'dni',
        'direccionDentista',
        'telefonoDentista',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'pivot'
    ];

    /**
     * Funcion que retorna los datos de especialidades, un usuario se relaciona con muchas especialidades
     *
     * @return void
     */
    public function especialidades(){
        // return $this->belongsToMany(ModeloEspecialidades::class,'specialty_user');
        return $this->belongsToMany(Speciality::class,'specialty_user')->withTimestamps();

    }
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopePatients($query){
        return $query->where('role','paciente');
    }
    public function scopeDentistas($query){
        return $query->where('role','dentista');
    }
}
