@extends('layouts.app')

@section('content')
<table class="table">
    <thead>
<th>Categoria</th>
<th>Asunto</th>
<th>Respuesta</th>
<th>Acciones</th>
    </thead>
    <tbody>
        @foreach ($pqrs as $pqrss)
            <tr>
                <td>{{$pqrss->categoria}}</td>
                <td>{{$pqrss->asunto}}</td>
                <td>{{$pqrss->respuesta}}</td>acudiente
                <td>{{$pqrss->acudientes->id}}</td>
                <td><a href="{{route('pqrs.edit',$pqrss)}}">Responder</a>
                  
                 </td>
            </tr>
        @endforeach

    </tbody>
</table>
@endsection
