@extends('layouts.app')

@section('content')
<table class="table">
    <thead>
<th>Nombre de area</th>
<th>Acciones</th>
    </thead>
    <tbody>
        @foreach ($areas as $area)
            <tr>
                <td>{{$area->nombre_area}}</td>
                <td><a href="{{route('areas.edit',$area)}}">Editar</a>
                  
                 </td>
            </tr>
        @endforeach

    </tbody>
</table>
@endsection
