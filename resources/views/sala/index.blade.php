@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>Estudiante</th>
                <th>Zonas de servicio</th>
                <th>Fecha de postulación</th>
                <th>Estado</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @foreach ($salas as $sala)
        <tr>
            <td>{{$sala->estu->user->name}}</td>
            <td>{{$sala->zonaSS->nombre_zona}}</td>
            <td>{{date('d-m-Y', strtotime($sala->created_at))}}</td>
            <td>{{$sala->estado_servicio}}</td>
            <td> @include('sala.aceptar') </td>
            <td>@include('sala.rechazar')</td>
        </tr>
        @endforeach
    </tbody>
    </table>
</div>
@endsection