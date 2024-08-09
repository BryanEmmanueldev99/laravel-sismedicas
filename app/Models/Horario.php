<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;
    protected $fillable = [
           'dia_horario',
           'hora_inicio_horario',
           'hora_fin_horario',
           'doctor_id',
           'consultorio_id'
    ];

    public function doctor() {
        return $this->belongsTo(Doctor::class);
    }

    public function consultorio() {
        return $this->belongsTo(Consultorio::class);
    }
}
