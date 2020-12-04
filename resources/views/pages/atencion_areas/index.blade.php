@extends('layouts.app')
@section('content')
@section('nav')
@include('layouts.partials.dashNav')
@endsection
@if (session('status'))
@section('script')
@include('layouts.partials.alerts',[
'option' => session('status'),
])
@endsection
@endif
<table class="table">
    <thead>
<th>Dia de la semana</th>
<th>Hora inicion de atención</th>
<th>Hora Final de atención</th>
<th>Docente</th>
<th>Area</th>
    </thead>
    <tbody>
        @foreach ($AtencionArea as $item)
            <tr>
                <td>{{$item->diaSemana}}</td>
                <td>{{$item->hora_inicio_atencion}}</td>
                <td>{{$item->hora_final_atencion}}</td>
                <td>{{$item->user->name}}
                    {{$item->user->apellido}}
                </td>
                <td>{{$item->are->nombre_area}}</td>
                <td><a href="{{route('atencion_aa.edit',$item)}}">Editar</a>
                  
                 </td>
            </tr>
        @endforeach

    </tbody>
</table>
@endsection
