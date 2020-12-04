@extends('layouts.app')
@section('content')
<form method="POST" action="{{ route('agendaWeb.store') }}">
    @csrf
<table class="table">
    <thead>
<th>Nombre</th>
<th>Apellido</th>

    </thead>
    <tbody>
      @foreach ($estudiante as $item)
      <tr>
  <td>{{$item->user->name}}</td>
  <td>{{$item->user->apellido}}</td>
  <td>
    <div class=" ">
        <select  class="form-control" id="A{{$item->id}}" name="A{{$item->id}}"  required>
            <option value="Citación">Citación</option>
            <option value="Observación">Observación</option>
            <option value="Reporte de notas">Reporte de notas</option>
            <option value="Plan de mejoramiento">Plan de mejoramiento</option>
        </select>
    </div>
 </td>
 <td>
     <textarea id="B{{$item->id}}" maxlength="100" name="B{{$item->id}}"  rows="1"></textarea>
 </td>

    </tr>
    {{-- inptus para registrar estudiante --}}
    <input id="estudiante_id" type="hidden" class="form-control @error('estudiante_id') is-invalid @enderror" name="estudiante_id" value="{{$item->id}}" required autocomplete="curso" autofocus  readonly>
    <input id="tc" type="hidden" class="form-control @error('tc') is-invalid @enderror" name="tc" value="{{$tc}}" required autocomplete="curso" autofocus  readonly>
    {{-- <input id="docente_curso" type="hidden" class="form-control @error('docente_curso') is-invalid @enderror" name="docente_curso" value="{{$docente_curso}}" required autocomplete="curso" autofocus  readonly> --}}
      @endforeach  
    </tbody>
</table>
<div style="text-align: center">

    <button type="submit" class="btn btn-primary">Registrar Agenda Web</button>
</div>
</form>
@endsection