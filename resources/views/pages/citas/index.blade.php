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

