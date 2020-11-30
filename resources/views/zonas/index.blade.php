@extends('layouts.app')
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nombre zona</th>
                <th scope="col">Lugar</th>
                <th scope="col">Encargado</th>
                <th scope="col">Hora entrada</th>
                <th scope="col">Hora salida</th>
                <th scope="col">Tiempo a prestar</th>
                <th scope="col">Cupos</th>
                <th scope="col">Labores</th>
                <th scope="col">Dias</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($zonas as $zona)
                <tr>
                    <td>{{ $zona->nombre_zona }}</td>
                    <td>{{ $zona->lugar }}</td>
                    <td>{{ $zona->encargado }}</td>
                    <td>{{ $zona->hora_entrada }}</td>
                    <td>{{ $zona->hora_salida }}</td>
                    <td>{{ $zona->tiempo_servicio }}</td>
                    <td>{{ $zona->cupos }}</td>
                    <td>{{ $zona->labores }}</td>
                    <td>{{ $zona->dias_servicio }}</td>
                    @if (Auth::user()->rol == 1)
                        <td><a href="{{ route('zonas.edit', $zona) }}">Editar</a></td>
                        <td><a href="">Eliminar</a></td>
                    @else
                        <td>
                            <form action="{{ route('sala.store', $zona) }}" method="POST">
                              @csrf
                              @method('put')
                              <button type="submit" class="btn btn-MC">Postular</button>
                            </form>
                        </td>
                    @endif
                </tr>
        </tbody>
        @endforeach
    </table>
@endsection
