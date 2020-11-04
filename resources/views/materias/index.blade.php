@extends('layouts.app')
@section('content')
<div class="card-body">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
</div>
<table class="table">
    <thead>
<th>Nombre materia</th>
<th>Nombre Area</th>
<th>Opciones</th>
    </thead>
    <tbody>
        @foreach ($materias as $materia)
           <tr>
               <td>{{$materia->nombre_materia}}</td>
               <td>{{$materia->areaM->nombre_area}}</td>
               <td><a href="{{route('materias.edit',$materia)}}">Actualizar</a>
                              
               </td>
           </tr>
        @endforeach
    </tbody>
</table>
@endsection
