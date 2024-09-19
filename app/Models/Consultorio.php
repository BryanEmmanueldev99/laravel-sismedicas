<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultorio extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre_consultorio',
        'ubicacion_consultorio',
        'capacidad_consultorio',
        'telefono_consultorio',
        'especialidad_consultorio',
        'estado_consultorio',
    ];

    public function doctores() {
        return $this->hasMany(Doctor::class);
    }

    public function horarios() {
        return $this->hasMany(Horario::class);
    }

    public function events() {
        return $this->hasMany(Event::class);
   }
}
