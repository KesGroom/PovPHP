{{-- se separaria por buscar el estudiante-acudiente , estudiante --}}

@extends('layouts.app')
@section('content')
my id {{$id}}
<form method="POST" action="{{ route('asistencias.AsistenciaEA') }}">
    @csrf
        <input id="id" type="hidden" class="form-control @error('id') is-invalid @enderror" name="id" value=" {{$id}}" required autocomplete="salon" autofocus readonly>
    <button class="btn btn-primary" type="submit">Consultar estudiante</button>
</form>
<br>
<br>
<br>

<form method="POST" action="{{ route('asistencias.AsistenciaEA') }}">
    @csrf
    <div class=" ">
        <label for="id">Estudiante</label>
        <select  class="form-control" id="id" name="id" required>
            @foreach ($estudiantes as $estudiante)
          
            <option value="{{$estudiante->id}}">Cedula:{{$estudiante->user->id}},{{$estudiante->user->name}} {{$estudiante->user->apellido}}</option>
            @endforeach
        </select>
    </div>

    <button class="btn btn-primary" type="submit">Consultar por Acudiente</button>
</form>

@endsection