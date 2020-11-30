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
            @foreach ($bi as $bitacora)
                <tr>
                    <td>{{ $bitacora->tiempo_prestado }}</td>
                    <td>{{ $bitacora->observaciones }}</td>
                    <td>{{ $bitacora->cantidad_labores }}</td>
                    <td>{{ $bitacora->salaSS->estu->user->name }} {{ $bitacora->salaSS->estu->user->apellido }}</td>
                    <td>{{ $bitacora->salaSS->zonaSS->nombre_zona }}</td>
                    <td><a href={{ route('bitacora.edit', $bitacora) }}>Editar</a></td>
                    <td><a href="">Eliminar</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
