@extends('layouts.app')

@section('content')
<table class="table">
    <thead>
<th>Nombre</th>
<th>Apellido</th>
    </thead>
    <tbody>
        @foreach ($acudientes as $acudiente)
            <tr>
                <td>{{$acudiente->user->name}}</td>
                <td>{{$acudiente->estado}}</td>
                <td></td>
            </tr>
        @endforeach

    </tbody>
</table>
@endsection
