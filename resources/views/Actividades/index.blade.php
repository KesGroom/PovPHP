@extends('layouts.app')
@section('content')

<table class="table">
    <thead>
       <th>Nombre</th>
       <th>Identificador</th>
       <th>Descripcion</th>
       <th>Recursos</th>
       <th>Categoria</th>
    </thead>
    <tbody>
          @foreach ($Actividad as $item)
              <tr>
                  <td>{{$item->nombre}}</td>
                  <td>{{$item->identificador}}</td>
                  <td>{{$item->descripcion}}</td>
                  <td>{{$item->recursos}}</td>
                  <td>{{$item->categoria}}</td>
                  <td><a href="{{route('actividades.edit',$item->id)}}">Editar</a>
                  </td>
              </tr>
          @endforeach
    </tbody>
</table>
@endsection
