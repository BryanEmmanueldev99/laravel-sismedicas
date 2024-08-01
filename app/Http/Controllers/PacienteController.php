<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacientes = Paciente::all();
        return view('admin.pacientes.index', compact('pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pacientes.create');
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
            'nombre_paciente' => 'required|max:250',
            'apellidos_paciente' => 'required|max:250',
            'fecha_nacimiento_paciente' => 'required',
            'genero_paciente' => 'required',
            'correo_paciente' => 'unique:pacientes|max:250',
        ]); 
        
        $paciente = new Paciente();
        $paciente->nombre_paciente = $request->nombre_paciente;
        $paciente->apellidos_paciente = $request->apellidos_paciente;
        $paciente->fecha_nacimiento_paciente = $request->fecha_nacimiento_paciente;
        $paciente->genero_paciente = $request->genero_paciente;
        $paciente->celular_paciente = $request->celular_paciente;
        $paciente->correo_paciente = $request->correo_paciente;
        $paciente->dirrecion_paciente = $request->dirrecion_paciente;
        $paciente->correo_paciente = $request->correo_paciente;
        $paciente->peso_paciente = $request->peso_paciente;
        $paciente->alergias_paciente = $request->alergias_paciente;
        $paciente->observaciones_paciente = $request->observaciones_paciente;
        $paciente->save();

        return redirect()->route('admin.pacientes.index')->with('status', 'Paciente agregado')->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $paciente = Paciente::findOrFail($id);
        return view('admin.pacientes.show', compact('paciente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $paciente = Paciente::findOrFail($id);
        return view('admin.pacientes.edit', compact('paciente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $paciente = Paciente::find($id);

        $request->validate([
            'nombre_paciente' => 'required|max:250',
            'apellidos_paciente' => 'required|max:250',
            'fecha_nacimiento_paciente' => 'required',
            'genero_paciente' => 'required',
            'correo_paciente' => 'max:250|unique:pacientes,correo_paciente,'.$paciente->id,
        ]); 
        
        $paciente->nombre_paciente = $request->nombre_paciente;
        $paciente->apellidos_paciente = $request->apellidos_paciente;
        $paciente->fecha_nacimiento_paciente = $request->fecha_nacimiento_paciente;
        $paciente->genero_paciente = $request->genero_paciente;
        $paciente->celular_paciente = $request->celular_paciente;
        $paciente->correo_paciente = $request->correo_paciente;
        $paciente->dirrecion_paciente = $request->dirrecion_paciente;
        $paciente->correo_paciente = $request->correo_paciente;
        $paciente->peso_paciente = $request->peso_paciente;
        $paciente->alergias_paciente = $request->alergias_paciente;
        $paciente->observaciones_paciente = $request->observaciones_paciente;
        $paciente->update();

        return redirect()->route('admin.pacientes.index')->with('status', 'Paciente actualizado')->with('icono', 'success');

    }

    public function viewdelete($id){
        $paciente = Paciente::findOrFail($id);
        return view('admin.pacientes.delete', compact('paciente'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $paciente = Paciente::find($id);
        $paciente->delete();

        return redirect()->route('admin.pacientes.index')->with('status', 'Paciente eliminado')->with('icono', 'success');

    }
}
