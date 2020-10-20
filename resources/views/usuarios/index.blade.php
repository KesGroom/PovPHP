@extends('layouts.app')

@section('content')
<table class="table">
    <thead>
<th>Documento</th>
<th>Name</th>
<th>Apellido</th>
<th>Correo</th>
<th>Fecha de nacimiento</th>
<th>Direccion</th>
<th>Celular</th>
<th>genero</th>
<th>Tipo de documento</th>
<th>Acciones</th>
    </thead>
    <tbody>
        @foreach ($usuarios as $usuario)
            <tr>
                <td>{{$usuario->id}}</td>
                <td>{{$usuario->name}}</td>
                <td>{{$usuario->apellido}}</td>
                <td>{{$usuario->email}}</td>
                <td>{{$usuario->fecha_nacimiento}}</td>
                <td>{{$usuario->direccion}}</td>
                <td>{{$usuario->celular}}</td>
                <td>{{$usuario->genero}}</td>
                <td>{{$usuario->tipo_documento}}</td>
                <td><a href="{{route('usuarios.edit',$usuario)}}">Editar</a>
                  
                 </td>
            </tr>
        @endforeach

    </tbody>
</table>
@endsection
