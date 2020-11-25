<?php

namespace App\Http\Controllers;

use App\Exports\TemplateExport;
use App\Exports\UserExport;
use App\Exports\UserTemplate;
use App\Imports\UsersImport;
use App\Models\Acudiente;
use App\Models\Area;
use App\Models\Curso;
use App\Models\Estudiante;
use App\Models\Grado;
use App\Models\Rol;
use App\Models\Rol_has_permiso;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Auth\Events\Registered;


class UserController extends Controller
{
  /**
   * Colección rhp
   * Está contiene la información de los permisos individuales que posee cada uno de los
   * usuarios del sistema, y esto se ve reflejado en la vista como el menú del Dashboard
   * por eso es incluido en la mayoría de los métodos. 
   *
   */
  /**
   * Página principal, lista de usuarios
   */
  public function index()
  {
    $usuarios = User::where('estado', 'Activo')->paginate('15');
    $rhp = RolHasPermisoController::rhp();
    return view('pages.usuarios.index', compact('usuarios', 'rhp'));
  }

  /** 
   * Métodos adignados a usuarios
   */
  //Redirección a la vista de datos removidos u ocultados
  public function recovery()
  {
    $usuarios = User::where('estado', 'Inactivo')->paginate('15');
    $rhp = RolHasPermisoController::rhp();
    return view('pages.usuarios.recovery', compact('usuarios', 'rhp'));
  }

  /**
   * Búsqueda de usuarios a tráves de un rol en específico
   * require = User
   */
  public function indexRol(User $usuario)
  {
    $usuarios = User::where([['estado', 'activo'], ['rol', $usuario->rol]])->paginate('15');
    $rhp = RolHasPermisoController::rhp();
    return view('pages.usuarios.index', compact('usuarios', 'rhp'));
  }

  /**
   * Reestablece la foto de perfil de un usuario específico
   * require = User
   */
  public function photoReset(User $usuario)
  {
    $usuario->foto_perfil = 'icon.png';
    $usuario->save();

    $usuarios = User::where('estado', 'activo')->paginate('15');
    $rhp = RolHasPermisoController::rhp();
    MailController::replace($usuario);
    return back()->with(compact('usuarios', 'rhp'));
  }

  /**
   * Cambia el estado de un usuario específico a Inactivo (Alternativa a la eliminación)
   * require = User
   */
  public function delete(User $usuario)
  {
    $usuario->estado = 'Inactivo';
    $usuario->save();

    $usuarios = User::where('estado', 'activo')->paginate('15');
    $rhp = RolHasPermisoController::rhp();
    $status = 'SwalDelete';
    return back()->with(compact('usuarios', 'rhp', 'status'));
  }

  /**
   * Cambia el estado de un usuario específico a Activo
   * require = User
   */
  public function restore(User $usuario)
  {
    $usuario->estado = 'Activo';
    $usuario->save();

    $usuarios = User::where('estado', 'Inactivo')->paginate('15');
    $rhp = RolHasPermisoController::rhp();
    $status = 'SwalRestore';
    return back()->with(compact('usuarios', 'rhp', 'status'));
  }

  //Redirección a la vista de creación de usuarios
  public function create()
  {
    $rhp = RolHasPermisoController::rhp();
    $roles = Rol::where('estado', 'Activo')->get();
    $areas = Area::where('estado', 'Activo')->get();
    $acudientes = User::where([['estado', 'activo'], ['rol', '4']])->select('id')->get();
    return view('pages.usuarios.create', compact('rhp', 'roles', 'acudientes', 'areas'));
  }

  /**
   * Metodo de registro de usuarios
   * require = Request
   */

  public function store(Request $request)
  {
    $usuario = new User();

    $validatedData = $request->validate([
      'id' => 'required|min:8|max:10|unique:users',
      'name' => 'required|min:3|max:50',
      'apellido' => 'required|min:3|max:50',
      'email' => 'required|min:3|max:250|unique:users',
      'fecha_nacimiento' => 'required',
      'direccion' => 'required|min:3|max:100',
      'celular' => 'required|min:3|max:12',
      'telefono_fijo' => 'required|min:3|max:8',
      'genero' => 'required',
      'tipo_documento' => 'required',
      'rol' => 'required'
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
    $usuario->foto_perfil = 'icon.png';
    $usuario->estado  = "Activo";
    $usuario->tipo_documento = $validatedData['tipo_documento'];
    $usuario->rol = $validatedData['rol'];
    $usuario->password = bcrypt($validatedData['id']);
    switch ($validatedData['rol']) {
      case 2:
        $usuario->save();
        break;
      case 3:
        $usuario->save();
        $estudiante = new Estudiante();
        $validatedEst = $request->validate([
          'acudiente' => 'required|min:8|max:10',
          'grade' => 'required',
          'course' => 'required',
          'nivel_type' => 'required'
        ]);
        $estudiante->id = $validatedData['id'];
        $estudiante->acudiente = $validatedEst['acudiente'];
        $estudiante->curso = $validatedEst['course'];
        $estudiante->estado = 'Activo';
        if ($validatedEst['nivel_type'] == 'Media') {
          $estudiante->estado_servicio_social = 'Disponible';
        } else {
          $estudiante->estado_servicio_social = 'No aplica';
        }
        $estudiante->tiempo_servicio = 0;
        $estudiante->save();
        break;
      case 4:
        $usuario->save();
        $acudiente = new Acudiente();
        $acudiente->id = $validatedData['id'];
        $acudiente->estado = 'Activo';
        $acudiente->save();
        break;
      default:
        $usuario->save();
        break;
    }
    event(new Registered($usuario));
    $status = 'SwalCreate';
    return back()->with(compact('status'));
  }

  /**
   * Redirige a la vista de edición con los datos del usuario seleccionado
   * require = User
   */
  public function edit(User $usuario)
  {
    $rhp = RolHasPermisoController::rhp();
    return view('pages.usuarios.edit', compact('usuario', 'rhp'));
  }

  /**
   * Cambia la información del usuario seleccionado
   * require = User, Request
   */
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
    $usuario->estado  = "Activo";
    $usuario->tipo_documento = $validatedData['tipo_documento'];
    $usuario->save();
    $status = 'SwalUpdate';
    return back()->with(compact('status'));
  }

  /**
   * Métodos de actualización del perfil, disponibles para cualquier tipo de usuario
   */
  //Redirección a a la vista de edición de perfil
  public function editProfile(User $usuario)
  {
    $rhp = RolHasPermisoController::rhp();
    return view('pages.userPages.editProfile', compact('usuario', 'rhp'));
  }

  //Cambio de contraseña
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

  //Cambio de foto de perfil
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

  //Edición de información de contacto
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

  /**
   * Métodos para realizar la exportación e importación de datos
   */
  //Excel
  public function export()
  {
    // return Excel::download(new UserExport, 'usuarios.xlsx');
    $titulos = [
      'titulo' => [
        'Tipo de documento',
        'Número de documento',
        'Nombre',
        'Apellido',
        'Correo electrónico',
        'Fecha de nacimiento',
        'Dirección',
        'Celular',
        'Telefono fijo',
        'Genero',
        'Rol',
      ]
    ];

    $collection = collect($titulos);
    return Excel::download(new TemplateExport(User::where('estado', 'Activo')->get(), $collection), 'usuarios.xlsx');
  }
  public function template()
  {
    return Excel::download(new UserTemplate, 'Plantilla_usuarios.xlsx');
  }
  public function import(Request $request)
  {
    $file = $request->file('newFile');
    Excel::import(new UsersImport, $file);

    $usuarios = User::where('estado', 'activo')->paginate('15');
    $rhp = RolHasPermisoController::rhp();
    return view('pages.usuarios.index', compact('usuarios', 'rhp'));
  }

  /**
   * Método para realizar la búsqueda global de datos
   * require = Request
   */

  public function searchList(Request $request)
  {
    $rhp = RolHasPermisoController::rhp();
    $texto = $request->texto;
    $usuarios = User::where([['name', 'like', '%' . $request->texto . '%'], ['estado', 'Activo']])
      ->orWhere([['apellido', 'like', '%' . $request->texto . '%'], ['estado', 'Activo']])
      ->orWhere([['id', 'like', '%' . $request->texto . '%'], ['estado', 'Activo']])
      ->orWhere([['direccion', 'like', '%' . $request->texto . '%'], ['estado', 'Activo']])
      ->orWhere([['fecha_nacimiento', 'like', '%' . $request->texto . '%'], ['estado', 'Activo']])
      ->orWhere([['telefono_fijo', 'like', '%' . $request->texto . '%'], ['estado', 'Activo']])
      ->orWhere([['celular', 'like', '%' . $request->texto . '%'], ['estado', 'Activo']])
      ->orWhere([['email', 'like', '%' . $request->texto . '%'], ['estado', 'Activo']])
      ->latest()
      ->take('24')
      ->get();
    $count = User::where([['name', 'like', '%' . $request->texto . '%'], ['estado', 'Activo']])
      ->orWhere([['apellido', 'like', '%' . $request->texto . '%'], ['estado', 'Activo']])
      ->orWhere([['id', 'like', '%' . $request->texto . '%'], ['estado', 'Activo']])
      ->orWhere([['direccion', 'like', '%' . $request->texto . '%'], ['estado', 'Activo']])
      ->orWhere([['fecha_nacimiento', 'like', '%' . $request->texto . '%'], ['estado', 'Activo']])
      ->orWhere([['telefono_fijo', 'like', '%' . $request->texto . '%'], ['estado', 'Activo']])
      ->orWhere([['celular', 'like', '%' . $request->texto . '%'], ['estado', 'Activo']])
      ->orWhere([['email', 'like', '%' . $request->texto . '%'], ['estado', 'Activo']])
      ->count();
    return view('pages.usuarios.userResult', compact('rhp', 'usuarios', 'texto', 'count'));
  }
}
