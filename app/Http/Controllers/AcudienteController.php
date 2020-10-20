<?php

namespace App\Http\Controllers;

use App\Models\Acudiente;
use App\Models\User;
use Illuminate\Http\Request;

class AcudienteController extends Controller
{
    public function create()
    {
        return view('acudientes.create');
    }
    public function store(Request $request)
    {
        $validatedData =$request->validate([
            'id' => 'required|min:3|max:250|unique:users',
            'name' => 'required|min:3|max:250',
            'apellido' => 'required|min:3|max:250',
            'email' => 'required|unique:users',
            'fecha_nacimiento' => 'required',
            'direccion' => 'required|min:3|max:250',
            'celular' => 'required|min:3|max:250',
            'telefono_fijo' => 'required|min:3|max:250',
            'genero' => 'required',
            'password' => 'required|min:3|max:250',
            'foto_perfil' => 'required',
            'tipo_documento' => 'required',
      ]);
             $user = new User();
             $user->id  = $validatedData['id'];
             $user->name = $validatedData['name'];
             $user->apellido = $validatedData['apellido'];
             $user->email = $validatedData['email'];
             $user->fecha_nacimiento = $validatedData['fecha_nacimiento'];
             $user->direccion = $validatedData['direccion'];
             $user->celular  = $validatedData['celular'];
             $user->telefono_fijo = $validatedData['telefono_fijo'];
             $user->genero = $validatedData['genero'];
             $user->password  =  bcrypt($validatedData['password']);
             $user->foto_perfil = $validatedData['foto_perfil'];
             $user->estado  = "Activo";
             $user->tipo_documento = $validatedData['tipo_documento'];
             $user->rol = 4;
             $user->save();
             $acuudiente = new Acudiente();
             $acuudiente->estado  ="Activo";
             $acuudiente->id = $validatedData['id'];
             $acuudiente->save();
             $status = 'Se ha registaro un nuevo usuario';
    return back()->with(compact('status'));
    }
    public function index()
    {
        $acudientes = Acudiente::all();
        return view('acudientes.index', compact('acudientes'));
    }
}
