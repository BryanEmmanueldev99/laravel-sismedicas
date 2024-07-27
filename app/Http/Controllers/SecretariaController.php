<?php

namespace App\Http\Controllers;

use App\Models\Secretaria;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SecretariaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $secretarias = Secretaria::all();
        return view('admin.secretarias.index', compact('secretarias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.secretarias.create');
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
            'nombre_secretaria' => 'required|max:250',
            'apellido_secretaria' => 'required|max:250',
            'celular_secretaria' => 'required',
            'fecha_nacimiento_secretaria' => 'required',
            'dni_secretaria' => 'required|unique:secretarias',
            'email' => 'required|unique:users',
            'password' => 'required|confirmed',
        ]);

           $usuario = new User();
           $usuario->name = $request->nombre_secretaria;
           $usuario->email = $request->email;
           $usuario->password = Hash::make($request['password']);
           $usuario->save();

           $secretaria = new Secretaria();
           $secretaria->nombre_secretaria = $request->nombre_secretaria;
           $secretaria->apellido_secretaria = $request->apellido_secretaria;
           $secretaria->celular_secretaria = $request->celular_secretaria;
           $secretaria->fecha_nacimiento_secretaria = $request->fecha_nacimiento_secretaria;
           $secretaria->dni_secretaria = $request->dni_secretaria;
           $secretaria->user_id = $usuario->id;
           $secretaria->save();

           return redirect()->route('admin.secretarias.index')->with('status', 'Secretaria agregada correctamente')->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Secretaria  $secretaria
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $secretaria = Secretaria::with('user')->findOrFail($id);
        return view('admin.secretarias.show', compact('secretaria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Secretaria  $secretaria
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $secretaria = Secretaria::with('user')->findOrFail($id);
        return view('admin.secretarias.edit', compact('secretaria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Secretaria  $secretaria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //busca el id mediante el modelo de secretaria
        $secretaria = Secretaria::find($id);
        $request->validate([
            'nombre_secretaria' => 'required|max:250',
            'apellido_secretaria' => 'required|max:250',
            'celular_secretaria' => 'required',
            'fecha_nacimiento_secretaria' => 'required',
            'dni_secretaria' => 'required|unique:secretarias,dni_secretaria,'. $secretaria->id,
            'email' => 'required|unique:users,email,'. $secretaria->user->id,
            'password' => 'nullable|confirmed',
        ]);

           $secretaria->nombre_secretaria = $request->nombre_secretaria;
           $secretaria->apellido_secretaria = $request->apellido_secretaria;
           $secretaria->celular_secretaria = $request->celular_secretaria;
           $secretaria->fecha_nacimiento_secretaria = $request->fecha_nacimiento_secretaria;
           $secretaria->dni_secretaria = $request->dni_secretaria;
           $secretaria->save();

           $usuario = User::find($secretaria->user->id);
           $usuario->name = $request->nombre_secretaria;
           $usuario->email = $request->email;

           if($request->filled('password')){
            $usuario->password = Hash::make($request['password']);
         }else{
                //no hagas nada
         }
         $usuario->save();

           return redirect()->route('admin.secretarias.index')->with('status', 'Secretaria actualizada correctamente')->with('icono', 'success');
       
    }

    public function viewdelete($id){
        $secretaria = Secretaria::with('user')->findOrFail($id);
        return view('admin.secretarias.delete', compact('secretaria'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Secretaria  $secretaria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $secretaria = Secretaria::find($id);
        //le paso la relación a la variable usuario
        $usuario = $secretaria->user;
        //borramos primero al usuario por la relacion que tiene
        $usuario->delete();
        //Y ya luego borramos a la secretaria
        $secretaria->delete();

        return redirect()->route('admin.secretarias.index')->with('status', 'Secretaria eliminada correctamente')->with('icono', 'success');
    }
}
