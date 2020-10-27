<?php

namespace App\Http\Controllers;

use App\Exports\UserExport;
use App\Exports\UserTemplate;
use App\Imports\UsersImport;
use App\Models\Rol_has_permiso;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
  public function index()
  {
    $usuarios = User::where('estado', 'activo')->paginate('15');
    $rol = Auth::user()->rol;
    $rhp = Rol_has_permiso::where('rol', $rol)->get();
    return view('usuarios.index', compact('usuarios', 'rhp'));
  }

  public function indexRol(User $usuario)
  {
    $usuarios = User::where([['estado', 'activo'], ['rol', $usuario->rol]])->paginate('15');
    $rol = Auth::user()->rol;
    $rhp = Rol_has_permiso::where('rol', $rol)->get();
    return view('usuarios.index', compact('usuarios', 'rhp'));
  }

  public function photoReset(User $usuario)
  {
    $usuario->foto_perfil = 'icon.png';
    $usuario->save();

    $usuarios = User::where('estado', 'activo')->paginate('15');
    $rol = Auth::user()->rol;
    $rhp = Rol_has_permiso::where('rol', $rol)->get();
    return back()->with(compact('usuarios', 'rhp'));
  }

  public function delete(User $usuario)
  {
    $usuario->estado = 'Inactivo';
    $usuario->save();

    $usuarios = User::where('estado', 'activo')->paginate('15');
    $rol = Auth::user()->rol;
    $rhp = Rol_has_permiso::where('rol', $rol)->get();
    return back()->with(compact('usuarios', 'rhp'));
  }
  public function edit(User $usuario)
  {
    $rol = Auth::user()->rol;
    $rhp = Rol_has_permiso::where('rol', $rol)->get();
    return view('usuarios.edit', compact('usuario', 'rhp'));
  }
  public function editProfile(User $usuario)
  {
    $rol = Auth::user()->rol;
    $rhp = Rol_has_permiso::where('rol', $rol)->get();
    return view('userPages.editProfile', compact('usuario', 'rhp'));
  }

  public function updatePass(Request $request, User $usuarioPass)
  {
    $validatedData = $request->validate([
      'oldPass' => 'required|min:8|max:255',
      'newPass' => 'required|min:8|max:255',
      'confirmPass' => 'required|min:8|max:255'
    ]);
    if (Hash::check($validatedData['oldPass'], $usuarioPass->password)) {
      if ($validatedData['newPass']  == $validatedData['confirmPass']) {
        $usuarioPass->password = bcrypt($validatedData['newPass']);
        $usuarioPass->save();
      }
    }
    if (session('lang') == 'es') {
      $status = 'Su contraseña se ha actualizado satisfactoriamente';
    } else {
      $status = 'Your password has been successfully updated';
    }
    return back()->with(compact('status'));
  }

  public function updatePhoto(Request $request, User $usuarios)
  {
    if ($request->hasFile('newFile')) {
      $file = $request->file("newFile");
      $nombrearchivo  = $file->getClientOriginalName();
      $file->move(public_path("storage/imgPerfil/"), $nombrearchivo);
      $usuarios->foto_perfil = $nombrearchivo;
    }
    $usuarios->save();
    if (session('lang') == 'es') {
      $status = "Su foto de perfil se ha cambiado satisfactoriamente";
    } else {
      $status = "Your profile picture has been successfully changed";
    }
    return back()->with(compact('status'));
  }

  public function updateInfo(Request $request, User $usuario)
  {

    $validatedData = $request->validate([
      'email' => 'required|min:3|max:250|unique:users,id,' . $usuario->id,
      'direccion' => 'required|min:3|max:100',
      'celular' => 'required|min:3|max:12',
      'telefono_fijo' => 'required|min:3|max:8',
    ]);
    $usuario->id = Auth::user()->id;
    $usuario->email = $validatedData['email'];
    $usuario->direccion = $validatedData['direccion'];
    $usuario->celular  = $validatedData['celular'];
    $usuario->telefono_fijo = $validatedData['telefono_fijo'];
    $usuario->save();
    if (session('lang') == 'es') {
      $status = 'Se ha actualizado su información de contacto';
    } else {
      $status = 'Your contact information has been updated';
    }
    return back()->with(compact('status'));
  }

  public function update(Request $request, User $usuario)
  {

    $validatedData = $request->validate([
      'id' => 'required|min:3|max:10|unique:users,id,' . $usuario->id,
      'name' => 'required|min:3|max:50',
      'apellido' => 'required|min:3|max:50',
      'email' => 'required|min:3|max:250|unique:users,id,' . $usuario->id,
      'fecha_nacimiento' => 'required',
      'direccion' => 'required|min:3|max:100',
      'celular' => 'required|min:3|max:12',
      'telefono_fijo' => 'required|min:3|max:8',
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

  public function export()
  {
    return Excel::download(new UserExport, 'usuarios.xlsx');
  }
  public function template()
  {
    return Excel::download(new UserTemplate, 'Plantilla_usuarios.xlsx');
  }
  public function import(Request $request)
  {
      // $request->validate([
      //     'nombre' => ['required','unique:productos,nombre'],
      // ]);
      $file = $request->file('newFile');
      Excel::import(new UsersImport, $file);

      $usuarios = User::where('estado', 'activo')->paginate('15');
      $rol = Auth::user()->rol;
      $rhp = Rol_has_permiso::where('rol', $rol)->get();
      return view('usuarios.index', compact('usuarios', 'rhp'));
  }
}
