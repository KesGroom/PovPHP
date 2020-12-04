@extends('layouts.app')

@section('content')
<table class="table">
    <thead>
   <th>Nombre</th>
   <th>Apellido</th>
    </thead>
    <tbody>
        @foreach ($estudiantes as $estudiante)
  <tr>
    <td>{{$estudiante->user->name}}</td>
    <td>{{$estudiante->user->apellido}}</td>
    <td>
        <form  method="POST" action="{{route('asistencias.asistenciasEstudiante')}}">
            @csrf
            <input  type="hidden" class="form-control @error('estudiante') is-invalid @enderror" name="estudiante" value="{{$estudiante->id}}" required autocomplete="estudiante" autofocus readonly>
            <input  type="hidden" class="form-control @error('docente_curso') is-invalid @enderror" name="docente_curso" value="{{$valiable}}" required autocomplete="docente_curso" autofocus readonly>
            <button class="btn btn-primary">Asistencias</button>
            </form>
    </td>
  </tr>
@endforeach
    </tbody>
</table>

@endsection
