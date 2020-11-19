mis asistencias
@extends('layouts.app')
@section('content')
<table class="table">

    <thead>
        <th>Tema trabajado</th>
        <th>Asistencia</th>
        <th>Observacion</th>
      <th>Periodo</th>
      <th>Fecha</th>
    </thead>
    <tbody>
        @foreach ($asitencia as $item)
        <tr>
                <td>  {{$item->tema_trabajado}}</td>
               <td>{{$item->asistencia}}</td>
               <td>{{$item->observaciones}}</td>
              <td> {{$item->periodo}}</td>  
               <td>{{$item->updated_at}}</td> 
        </tr>
            
        @endforeach
        
    </tbody>
</table>
@endsection