@extends('layouts.app')

@section('content')
<table class="table">
    <thead>
<th>Nombre de area</th>
<th>Nivel educativo</th>
<th>Acciones</th>
    </thead>
    <tbody>
        @foreach ($grados as $grado)
            <tr>
                <td>{{$grado->nombre_grado}}</td>
                <td>{{$grado->nivel_educativo}}</td>
                <td><a href="{{route('grados.edit',$grado)}}">Editar</a>
                  
                 </td>
            </tr>
        @endforeach

    </tbody>
</table>
@endsection
