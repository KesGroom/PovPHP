@extends('layouts.app')
@section('content')
<table class="table">
    <thead>
<th>Dia de la semana</th>
<th>Hora inicion de atención</th>
<th>Hora Final de atención</th>
<th>Docente</th>
<th>Area</th>
    </thead>
    <tbody>
        @foreach ($AtencionCurso as $item)
            <tr>
                <td>{{$item->diaSemana}}</td>
                <td>{{$item->hora_inicio_atencion}}</td>
                <td>{{$item->hora_final_atencion}}</td>
                <td>{{$item->user->name}}
                    {{$item->user->apellido}}
                </td>
                <td>{{$item->cur->curso}}</td>
                <td><a href="{{route('atencion_ac.edit',$item)}}">Editar</a>
                  
                 </td>
            </tr>
        @endforeach

    </tbody>
</table>
@endsection
