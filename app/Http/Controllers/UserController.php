<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(){
       $usuarios = User::where('estado','activo')->get();
       return view('usuarios.index', compact('usuarios'));
    }
    public function edit(User $usuario){
      return view('usuarios.edit', compact('usuario'));
 
    }
    public function update(Request $request, User $usuario){

      $validatedData =$request->validate([
        'id' => 'required|min:3|max:250|unique:users,id,'.$usuario->id,
        'name' => 'required|min:3|max:250',
        'apellido' => 'required|min:3|max:250',
        'email' => 'required|min:3|max:250|unique:users,id,'.$usuario->id,
        'fecha_nacimiento' => 'required',
        'direccion' => 'required|min:3|max:250',
        'celular' => 'required|min:3|max:250',
        'telefono_fijo' => 'required|min:3|max:250',
        'genero' => 'required',
        'password' => 'required|min:3|max:250',
        'foto_perfil' => 'required',
        'tipo_documento' => 'required',
  ]);
         $usuario->id  = $validatedData['id'];
         $usuario->name = $validatedData['name'];
         $usuario->apellido = $validatedData['apellido'];
         $usuario->email = $validatedData['email'];
         $usuario->fecha_nacimiento = $validatedData['fecha_nacimiento'];
         $usuario->direccion = $validatedData['direccion'];
         $usuario->celular  = $validatedData['celular'];
         $usuario->telefono_fijo = $validatedData['telefono_fijo'];
         $usuario->genero = $validatedData['genero'];
         $usuario->password  =  bcrypt($validatedData['password']);
         $usuario->foto_perfil = $validatedData['foto_perfil'];
         $usuario->estado  = "Activo";
         $usuario->tipo_documento = $validatedData['tipo_documento'];
         $usuario->rol = 4;
         $usuario->save();
         $status = 'Se ha actualizado el usuario';
         return back()->with(compact('status'));
    }
    
    
}
