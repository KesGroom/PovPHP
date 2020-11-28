@extends('layouts.app')

@section('content')
<table class="table">
    <thead>
<th>Curso</th>
<th>Salon</th>
<th>nombre del grado</th>
<th>Acciones</th>
    </thead>
    <tbody>
        @foreach ($cursos as $curso)
            <tr>
                <td>{{$curso->curso}}</td>
                <td>{{$curso->salon}}</td>
                <td>{{$curso->grados->id}}</td>
                <td><a href="{{route('cursos.edit',$curso)}}">Editar</a>
                  
                 </td>
            </tr>
        @endforeach

    </tbody>
</table>
@endsection
