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
<h1>id : {{$curso}}</h1>
<h1>curso : {{$tc->curso}}</h1>
<table class="table">
    <thead>
       <th>Nombre</th>
       <th>Identificador</th>
       <th>Descripcion</th>
       <th>Recursos</th>
       <th>Categoria</th>
       <th>Acciones</th>
       <th>Metodos para el curso</th>
    </thead>
    <tbody>
          @foreach ($Actividad as $item)
              <tr>
                  <td>{{$item->nombre}}</td>
                  <td>{{$item->identificador}}</td>
                  <td>{{$item->descripcion}}</td>
                  <td>{{$item->recursos}}</td>
                  <td>{{$item->categoria}}</td>
                  <td><a href="{{route('actividades.edit',$item->id)}}">Editar</a>
                  </td>
                  <td>
                    <form method="POST" action="{{route('notas.create')}}">
                        @csrf
                        <input id="docente_curso" type="hidden" class="form-control @error('docente_curso') is-invalid @enderror" name="docente_curso" value="{{$curso}}" required autocomplete="docente_curso" autofocus readonly>
                        <input id="id" type="hidden" class="form-control @error('id') is-invalid @enderror" name="id" value="{{$item->id}}" required autofocus readonly>
                        <input id="tc" type="hidden" class="form-control @error('tc') is-invalid @enderror" name="tc" value="{{$tc->curso}}" required autocomplete="tc" autofocus readonly>
                          <button type="submit" class="btn btn-primary">Dar nota</button>
                      </form>
                      <br>
                      <form method="POST" action="{{route('agendaWeb.create')}}">
                        @csrf
                        <input id="docente_curso" type="hidden" class="form-control @error('docente_curso') is-invalid @enderror" name="docente_curso" value="{{$curso}}" required autocomplete="docente_curso" autofocus readonly>
                        <input id="id" type="hidden" class="form-control @error('id') is-invalid @enderror" name="id" value="{{$item->id}}" required autofocus readonly>
                        <input id="tc" type="hidden" class="form-control @error('tc') is-invalid @enderror" name="tc" value="{{$tc->curso}}" required autocomplete="tc" autofocus readonly>
                          <button type="submit" class="btn btn-primary">Agendar Web</button>
                      </form>
                  </td>
              </tr>
          @endforeach
    </tbody>
</table>
@endsection
