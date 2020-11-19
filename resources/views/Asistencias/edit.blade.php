@extends('layouts.app')

@section('content')

<div class="card-body">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
</div>
<form method="POST" action="{{ route('asistencias.update' , $estudiante) }}">
    @csrf
    @method('put')
    <div class="form-group row">
        <label for="tema_trabajado" class="col-md-4 col-form-label text-md-right">Tema trabajado</label>

        <div class="col-md-6">
            <input id="tema_trabajado" type="text" class="form-control @error('tema_trabajado') is-invalid @enderror" name="tema_trabajado" value="{{$estudiante->tema_trabajado}}" required autocomplete="tema_trabajado" autofocus>

            @error('tema_trabajado')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class=" ">
        <label for="area">Dia de la semana</label>
        <select  class="form-control" id="asistencia" name="asistencia"  required>
         <option value="Presente">Presente<option>
         <option value="Ausente">Ausente<option>
        <option value="Retardo">Retardo<option>
         </select>
    </div>
    <div class="form-group row">
        <label for=" observaciones" class="col-md-4 col-form-label text-md-right">Observaion</label>

        <div class="col-md-6">
            <input id=" observaciones" type="text" class="form-control @error(' observaciones') is-invalid @enderror" name=" observaciones" value="{{$estudiante-> observaciones}}" required autocomplete=" observaciones" autofocus>

            @error(' observaciones')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Editar Asistencia</button>
   
</form>
@endsection
