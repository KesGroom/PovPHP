@extends('layouts.app')
@section('content')
<div class="container">


<h1>Citas por Area</h1>
<div class="row">
@foreach ($citas_area as $e)
<div class="col-sm">
<div class="card">
  <div class="card-header">
   Hora: {{$e->fecha_cita}}
  </div>
  <div class="card-body">
    <h5 class="card-title">{{$e->AtencionPorArea->docente}}</h5>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
</div>
@endforeach
</div>
<h1>Citas Por Curso</h1>
@endsection

