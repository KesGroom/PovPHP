@extends('layouts.app')
@section('content')
    <ul>
        @forelse ($salas as $sala)
            <li>{{ $sala->estu->user->name }}({{ $sala->zonaSS->nombre_zona }})<br><a href="">ver bitacoras</a><a href="{{route('bitacora.create', $sala)}}">Añadir
                    bitacora</a></li>
        @empty
            <li>No hay estudiantes en servicio</li>
        @endforelse
    </ul>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Tiempo prestado</th>
                <th scope="col">Observaciones</th>
                <th scope="col">Cantidad de labores</th>
                <th scope="col">Estudiante</th>
                <th scope="col">Zona de servicio</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bi as $bita)
                <tr>
                    <td>{{ $bita->tiempo_prestado }}</td>
                    <td>{{ $bita->observaciones }}</td>
                    <td>{{ $bita->cantidad_labores }}</td>
                    <td>{{ $bita->salaSS->estu->user->name }} {{ $bita->salaSS->estu->user->apellido }}</td>
                    <td>{{ $bita->salaSS->zonaSS->nombre_zona }}</td>
                    <td><a href="{{ route('bitacora.edit', $bita) }}">Editar</a></td>
                    <td><a href="">Eliminar</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
