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
        @foreach ($citasArea as $item)
            <tr>
                <td>{{$item->asunto}}</td>
                <td>{{$curso->acudiente}}</td>
            </tr>
        @endforeach

    </tbody>
</table>
@endsection

