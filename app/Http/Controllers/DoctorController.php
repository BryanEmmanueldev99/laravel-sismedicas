<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctores = Doctor::with('user')->get();
        return view('admin.doctores.index', compact('doctores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.doctores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$data = request()->all();
        return response()->json($data);*/

        $request->validate([
            'nombre_doctor'     => 'required|max:250',
            'apellidos_doctor'    => 'required|max:250',
            'telefono_doctor' => 'required|max:250',
            'cedula_doctor' => 'required|max:250',
            'especialidad_doctor' => 'required|max:250',
            'email'    => 'required|max:250|unique:users',
            'password' => 'required|max:250|confirmed'
         ]);

           $usuario = new User();
           $usuario->name  =  $request->nombre_doctor;
           $usuario->email =  $request->email;
           $usuario->password = Hash::make($request['password']);
           $usuario->save();

           $doctor = new Doctor();
           $doctor->user_id = $usuario->id;
           $doctor->nombre_doctor = $request->nombre_doctor;
           $doctor->apellidos_doctor = $request->apellidos_doctor;
           $doctor->telefono_doctor = $request->telefono_doctor;
           $doctor->cedula_doctor = $request->cedula_doctor;
           $doctor->especialidad_doctor = $request->especialidad_doctor;
           $doctor->save();

           return redirect()->route('admin.doctores.index')->with('status', 'Médico agregado correctamente')->with('icono', 'success');
  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $doctor = Doctor::findOrFail($id);
        return view('admin.doctores.show', compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $doctor = Doctor::findOrFail($id);
        return view('admin.doctores.edit', compact('doctor'));
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
        $doctor = Doctor::find($id);

        $request->validate([
            'nombre_doctor'     => 'required|max:250',
            'apellidos_doctor'    => 'required|max:250',
            'telefono_doctor' => 'required|max:250',
            'cedula_doctor' => 'required|max:250',
            'especialidad_doctor' => 'required|max:250',
            'email'    => 'required|max:250|unique:users,email,'.$doctor->user->id,
            'password' => 'max:250|confirmed'
         ]);

           $doctor->nombre_doctor = $request->nombre_doctor;
           $doctor->apellidos_doctor = $request->apellidos_doctor;
           $doctor->telefono_doctor = $request->telefono_doctor;
           $doctor->cedula_doctor = $request->cedula_doctor;
           $doctor->especialidad_doctor = $request->especialidad_doctor;
           $doctor->save();

           $usuario = User::find($doctor->user->id);
           $usuario->name =  $request->nombre_doctor;
           $usuario->email = $request->email;

           if($request->filled('password')){
            $usuario->password = Hash::make($request['password']);
         }else{
                //no hagas nada
         }
         $usuario->save();
         $usuario->assignRole('doctor');
         

         return redirect()->route('admin.doctores.index')->with('status', 'Médico actualizado correctamente')->with('icono', 'success');
    }

    
    public function viewdelete($id) {
        $doctor = Doctor::findOrFail($id);
        return view('admin.doctores.delete', compact('doctor'));
    }


    public function destroy($id)
    {
        $doctor = Doctor::find($id);
        $usuario = $doctor->user;
        //borramos primero al usuario por la relacion que tiene
        $usuario->delete();
        //Y ya luego borramos a la secretaria
        $doctor->delete();

        return redirect()->route('admin.doctores.index')->with('status', 'Médico eliminado correctamente')->with('icono', 'success');
    }
}
