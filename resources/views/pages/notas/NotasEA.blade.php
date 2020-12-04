mis asistencias
@extends('layouts.app')
@section('content')
<table class="table">

    <thead>
        <th>Fecha entrega</th>
        <th>Calificacion</th>
        <th>Actividad</th>
      <th>Periodo</th>
      <th>Fecha</th>
    </thead>
    <tbody>
        @foreach ($nota as $item)
        <tr>
                <td>  {{$item->fecha_entrega}}</td>
               <td>{{$item->calificacion}}</td>
               <td>{{$item->activity->nombre}}</td>
              <td> {{$item->periodo}}</td>  
               <td>{{$item->updated_at}}</td> 
        </tr>
            
        @endforeach
        
    </tbody>
</table>
@endsection