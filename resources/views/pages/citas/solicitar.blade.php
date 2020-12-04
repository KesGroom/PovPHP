@extends('layouts.app')
@section('content')
<div class="container">
  <div class="card-body">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
</div>

<h1>Citas por Area</h1>

{{-- Formulario para despues registrar asunto --}}
<form method="POST" action="{{ route('citas.asuntoCita') }}">
 @csrf
  <div class="row">
    @foreach ($citas_area as $pepe)
    <div class="col-sm">
    <div class="card">
      <div class="card-header">
       Hora Inicio: {{$pepe->hora_inicio_atencion}}
       Hora Final: {{$pepe->hora_final_atencion}}
      </div>
      <div class="card-body">
        Profesor :<h5 class="card-title">{{$pepe->name}}  {{$pepe->name}}</h5>
         Dia :<h4 class="card-title">{{$pepe->diaSemana}}</h4>
       <button type="submit" class="btn btn-primary">Escoger Cita</button>
      </div>
    </div>
    </div>

    {{-- Inputs para registrar --}}

  <input id="id_cita" type="hidden" name="id_cita" value="{{$pepe->id}}" readonly>
    @endforeach
    </div>
</form>





<h1>Citas Por Curso</h1>

@endsection

