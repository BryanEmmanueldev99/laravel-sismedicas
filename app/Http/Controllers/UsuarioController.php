<?php

namespace App\Http\Controllers;

use App\Models\Secretaria;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function index() {
        //traete todo de la tb user
        $usuarios = User::all();
        return view('admin.usuarios.index', compact('usuarios'));
    }

    public function create() {
         
        return view('admin.usuarios.create');
    }

    public function store(Request $request) {
       //$usuario = request()->all();
       //return response()->json($usuario);

       $request->validate([
          'name'     => 'required|max:250',
          'email'    => 'required|max:250|unique:users',
          'password' => 'required|max:250|confirmed'
       ]);

       //si todo sale bien
       $usuario = new User();
       $usuario->name = $request->name;
       $usuario->email = $request->email;
       $usuario->password = Hash::make($request['password']);
       $usuario->save();

    
       return redirect()->route('admin.usuarios.index')->with('status', 'Usuario agregado correctamente')->with('icono', 'success');
    }

    public function show($id) {
          $usuario = User::findOrFail($id);
          return view('admin.usuarios.show',compact('usuario'));
    }

    public function edit($id){
        $usuario = User::findOrFail($id);
        return view('admin.usuarios.edit',compact('usuario'));
    }

    public function update(Request $request, $id){

        $usuario = User::find($id);
        $request->validate([
            'name'     => 'required|max:250',
            'email'    => 'required|max:250|unique:users,email,'.$usuario->id,
            'password' => 'nullable|max:250|confirmed'
         ]);

         $usuario->name = $request->name;
         $usuario->email = $request->email;
         
           if($request->filled('password')){
              $usuario->password = Hash::make($request['password']);
           }else{
                  //no hagas nada
           }

         $usuario->save();

         return redirect()->route('admin.usuarios.index')->with('status', 'Usuario actualizado correctamente')->with('icono', 'success');

    }

    public function view_destroy($id) {
        $usuario = User::findOrFail($id);
        return view('admin.usuarios.delete',compact('usuario'));
    }

    public function delete($id) {
        User::destroy($id);
        return redirect()->route('admin.usuarios.index')->with('status', 'Usuario eliminado correctamente')->with('icono', 'success');
    }
}
