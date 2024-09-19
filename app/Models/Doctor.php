<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $fillable = [
             'nombre_doctor',
             'apellidos_doctor',
             'telefono_doctor',
             'cedula_doctor',
             'especialidad_doctor',
             'user_id'
    ];

    public function consultorio() {
        return $this->belongsTo(Consultorio::class);
    }

    public function horarios() {
        return $this->hasMany(Horario::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function events() {
        return $this->hasMany(Event::class);
   }
}
