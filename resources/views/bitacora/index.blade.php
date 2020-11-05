@extends('layouts.app')
@section('content')
<table class="table">
    <thead>
      <tr>
        <th scope="col">Tiempo prestado</th>
        <th scope="col">Observaciones</th>
        <th scope="col">Cantidad de labores</th>
        <th scope="col">Sala de servicio</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($bi as $bitacora)
    <tr>
      <td>{{$bitacora->tiempo_prestado}}</td>
      <td>{{$bitacora->observaciones}}</td>
      <td>{{$bitacora->cantidad_labores}}</td>
      <td>{{$bitacora->sala_servicio}}</td>
      <td><a href="">Editar</a></td>
      <td><a href="">Eliminar</a></td>
    </tr>
  </tbody>     
    @endforeach
  </table>
@endsection