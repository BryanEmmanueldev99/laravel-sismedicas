<?php

namespace App\Http\Controllers;

use App\Models\Consultorio;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class ConsultorioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consultorios = Consultorio::all();  
        return view('admin.consultorios.index', compact('consultorios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.consultorios.create');
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
            'nombre_consultorio' => 'required|max:255',
            'ubicacion_consultorio' => 'required|max:255',
            'capacidad_consultorio' => 'required|max:255',
            'telefono_consultorio' => 'nullable|max:255',
            'especialidad_consultorio' => 'required|max:255',
            'estado_consultorio' => 'required|max:255',
        ]); 

       /* $consultorio = new Consultorio();
        $consultorio->nombre_consultorio = $request->nombre_consultorio;
        $consultorio->ubicacion_consultorio = $request->ubicacion_consultorio;
        $consultorio->capacidad_consultorio = $request->capacidad_consultorio;
        $consultorio->telefono_consultorio = $request->telefono_consultorio;
        $consultorio->especialidad_consultorio = $request->especialidad_consultorio;
        $consultorio->estado_consultorio = $request->estado_consultorio;
        $consultorio->save();*/

        //otro método para agregar registros
        Consultorio::create($request->all());

        return redirect()->route('admin.consultorios.index')->with('status', 'Consultorio agregado')->with('icono', 'success');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $consultorio = Consultorio::findOrFail($id);
        return view('admin.consultorios.show', compact('consultorio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $consultorio = Consultorio::findOrFail($id);
        return view('admin.consultorios.edit', compact('consultorio'));
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
        $request->validate([
            'nombre_consultorio' => 'required|max:255',
            'ubicacion_consultorio' => 'required|max:255',
            'capacidad_consultorio' => 'required|max:255',
            'telefono_consultorio' => 'nullable|max:255',
            'especialidad_consultorio' => 'required|max:255',
            'estado_consultorio' => 'required|max:255',
        ]); 

        $consultorio = Consultorio::find($id);
        $consultorio->update($request->all());

        return redirect()->route('admin.consultorios.index')->with('status', 'Consultorio actualizado')->with('icono', 'success');
    }

    
    public function viewdelete($id) {
           $consultorio = Consultorio::findOrFail($id);
           return view('admin.consultorios.delete', compact('consultorio'));
    }


    public function destroy($id)
    {
        $consultorio = Consultorio::find($id);
        $consultorio->delete();

        return redirect()->route('admin.consultorios.index')->with('status', 'Consultorio eliminado')->with('icono', 'success');
    }
}
