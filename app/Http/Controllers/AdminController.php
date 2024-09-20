<?php

namespace App\Http\Controllers;

use App\Models\Consultorio;
use App\Models\Doctor;
use App\Models\Event;
use App\Models\Paciente;
use App\Models\Secretaria;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    
    public function index () {
        $total_usuarios = User::count();
        $total_secretarias = Secretaria::count();
        $total_pacientes = Paciente::count();

         //datos requeridos para agendar cita médica
         $doctores = Doctor::all();
         $consultorios = Consultorio::all();
         $eventos = Event::all();

        return view('admin.index', compact(
        'total_usuarios', 
        'total_secretarias',
        'total_pacientes',
        'doctores',
        'consultorios',
        'eventos'
      ));
    }
}
