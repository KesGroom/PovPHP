@extends('layouts.app')

@section('content')

<table class="table">
    <thead>
   <th>Tema trabajo</th>
   <th>Asistencia</th>
   <th>observacion</th>
   <th>Fecha y hora de creacion</th>
    </thead>
    <tbody>
        @foreach ($registroAsitencia as $estudiante)
  <tr>
    <td>{{$estudiante->tema_trabajado}}</td>
    <td>{{$estudiante->asistencia}}</td>
    <td>{{$estudiante->observaciones}}</td>
    <td>{{$estudiante->created_at}}</td>
    <td><a href="{{route('asistencias.edit',$estudiante->id)}}">Editar</a>
                              
    </td>
  </tr>
@endforeach
    </tbody>
</table>

@endsection
