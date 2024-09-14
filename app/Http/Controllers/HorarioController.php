<?php

namespace App\Http\Controllers;

use App\Models\Consultorio;
use App\Models\Doctor;
use App\Models\Horario;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    public function recuerar_consultorios($id) {
           try {  
            $horarios = Horario::with('doctor','consultorio')->where('consultorio_id',$id)->get();
            return view('admin.horarios.cargar_consultorio', compact('horarios'));
           } catch (\Exception $e) {
                 return response()->json([
                     'mensaje' => 'error'
                 ]);
           }
    }
    
    public function index()
    {
        
        $horarios = Horario::with('doctor','consultorio')->get();
        $listado_de_consultorios = Consultorio::all();
        return view('admin.horarios.index', compact('horarios','listado_de_consultorios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
   
        $doctores = Doctor::all();
        $consultorios = Consultorio::all();
        $horarios = Horario::with('doctor','consultorio')->get();
        return view('admin.horarios.create', compact('doctores','consultorios','horarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //request
         $request->validate([
              'dia_horario' => 'required' ,
              'hora_inicio_horario' => 'required|date_format:H:i',
              'hora_fin_horario' => 'required|date_format:H:i|after:hora_inicio_horario',
         ]);

         //valida los horarios
         $HorarioYaExistente = Horario::where('dia_horario',$request->dia_horario)->where(function ($query) use ($request) {
              $query->where(function ($query) use ($request){
                     $query->where('hora_inicio_horario','>=',$request->hora_inicio_horario)->where('hora_inicio_horario','<',$request->hora_fin_horario);
              })
              ->orWhere(function ($query) use ($request) {
                $query->where('hora_fin_horario','>',$request->hora_inicio_horario)->where('hora_fin_horario','<=',$request->hora_fin_horario);
              })
              ->orWhere(function ($query) use ($request) {
                $query->where('hora_inicio_horario','<',$request->hora_inicio_horario)->where('hora_fin_horario','>',$request->hora_fin_horario);
              });
         })->exists();

         if($HorarioYaExistente){
             return redirect()->back()->withInput()->with('status', 'El horario ya existe, prueba con otro')->with('icono', 'error');
         }

        $data = request()->all();
        //return response()->json($data);

        Horario::create($request->all());

        return redirect()->route('admin.horarios.index')->with('status', 'Horario agregado correctamente')->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $horario = Horario::find($id);
        return view('admin.horarios.show', compact('horario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
