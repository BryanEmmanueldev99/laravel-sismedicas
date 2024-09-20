<?php

namespace App\Http\Controllers;

use App\Models\Consultorio;
use App\Models\Doctor;
use App\Models\Event;
use App\Models\Horario;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    private function traducir_dia($dia){
        $dias=[
            'Monday' => 'Lunes',
            'Tuesday' => 'Martes',
            'Wednesday' => 'Miercoles',
            'Thursday' => 'Jueves',
            'Friday' => 'Viernes',
            'Saturday' => 'Sabado',
            'Sunday' => 'Domingo',
        ];
        return $dias[$dia]??$dias;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'fecha_reserva'=>'required|date',
            'hora_reserva'=>'required|date_format:H:i',
        ]);

        //buscame el doctor primero y el consultorio
        $doctor = Doctor::find($request->doctor_id);
        $consultorio = Consultorio::find($request->consultorio_id);
        $fecha_reserva = $request->fecha_reserva;
        $hora_reserva = $request->hora_reserva.':00';

        
        $dia = date('l',strtotime($fecha_reserva));
        $dia_de_reserva = $this->traducir_dia($dia);
        $doctor_id = $doctor->id;
        
                //valida si existe el horario del doctor
                //SQL SELECT * FROM `horarios` WHERE 1 =`doctor_id` AND `dia_horario` = 'Miercoles' AND `hora_inicio_horario` = '09:00:00' AND `hora_fin_horario` >= '10:00:00'

        $horarios = Horario::where('doctor_id',$doctor_id)
          ->where('dia_horario',$dia_de_reserva)
          ->where('hora_fin_horario','>=',$hora_reserva)
          ->where('hora_inicio_horario','<=',$hora_reserva)
          ->exists();

           //valida si el doctor tiene el horario y dia disponible
           if(!$horarios){
            return redirect()->back()->with([
                'mensaje' => 'El doctor no esta disponible en ese horario.',
                'icono' => 'error',
                'hora_reserva'=> 'El doctor no esta disponible en ese horario.',
            ]);
        }

          $fecha_hora_reserva = $fecha_reserva." ".$hora_reserva;
          //valida si no existe eventos duplicados
          $eventos_duplicados = Event::where('doctor_id',$doctor_id)
                                ->where('start', $fecha_hora_reserva)
                                ->exists();
          ;

        // alternativa  if($eventos_duplicados){
        //     throw ValidationException::withMessages([
        //         'eventos_duplicados'=>['Ya existe una reserva con el mismo doctor en esa fecha y hora.']
        //     ]);
        //   }
        if($eventos_duplicados){
            return redirect()->back()->with([
                'mensaje' => 'Ya existe una reserva con el mismo doctor en esa fecha y hora.',
                'icono' => 'error',
                'hora_reserva'=> 'Ya existe una reserva con el mismo doctor en esa fecha y hora.',
            ]);
        }

        $event = new Event();
        $event->title = $request->hora_reserva." ".$consultorio->nombre_consultorio;
        $event->start = $request->fecha_reserva." ".$hora_reserva;
        $event->end = $request->fecha_reserva." ".$hora_reserva;
        $event->start_event_calendar = $request->fecha_reserva;	
        $event->color = $request->color;
        $event->user_id = 5;
        $event->doctor_id = $request->doctor_id;
        $event->consultorio_id = $request->consultorio_id;
        $event->save();

        return redirect()->route('admin.index')->with('status', 'Cita reservada exitosamente.')->with('icono', 'success');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }
}
