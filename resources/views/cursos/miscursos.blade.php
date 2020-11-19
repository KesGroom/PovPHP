@extends('layouts.app')

@section('content')

<table class="table">
    <thead>
<th>Curso</th>
<th>Salon</th>
<th>Materia</th>
    </thead>
    <tbody>
       @foreach ($cursos as $xd)
           <tr>
              <td>docente curso:{{$xd->id}}</td>
               <td>{{$xd->cur->curso}}</td>
               <td>{{$xd->cur->salon}}</td>
               <td>{{$xd->mate->nombre_materia}}</td>
               <td>
                <form method="POST" action="{{ route('cursos.asistencia') }}">
                    @csrf
                    <input id="docente_curso" type="hidden" class="form-control @error('docente_curso') is-invalid @enderror" name="docente_curso" value="{{$xd->id}}" required autocomplete="curso" autofocus readonly>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <input id="curso" type="hidden" class="form-control @error('curso') is-invalid @enderror" name="curso" value="{{$xd->curso}}" required autocomplete="curso" autofocus readonly>

                            @error('curso')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Dar asistencia</button>
                   </form>
                   <br>
                   <form method="POST" action="{{ route('asistencias.index') }}">
                    @csrf
                    <input id="docente_curso" type="hidden" class="form-control @error('docente_curso') is-invalid @enderror" name="docente_curso" value="{{$xd->id}}" required autocomplete="curso" autofocus readonly>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <input id="curso" type="hidden" class="form-control @error('curso') is-invalid @enderror" name="curso" value="{{$xd->curso}}" required autocomplete="curso" autofocus readonly>

                            @error('curso')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Editar Asistencia</button>
                   </form>
                   <br>
                   <form method="POST" action="{{route('actividades.index')}}">
                       @csrf
                    <input id="docente_curso" type="hidden" class="form-control @error('docente_curso') is-invalid @enderror" name="docente_curso" value="{{$xd->id}}" required autocomplete="curso" autofocus readonly>
                    <input id="curso" type="hidden" class="form-control @error('curso') is-invalid @enderror" name="curso" value="{{$xd->id}}" required autocomplete="curso" autofocus readonly>
                    <button type="submit" class="btn btn-primary">ver actividades</button>
                   </form>
                   <br>
                   <br>
                   <form method="POST" action="{{route('actividades.create')}}">
                       @csrf
                    <input id="docente_curso" type="hidden" class="form-control @error('docente_curso') is-invalid @enderror" name="docente_curso" value="{{$xd->id}}" required autocomplete="curso" autofocus readonly>
                    <button type="submit" class="btn btn-primary">crear actividades</button>
                   </form>
                   <br>
               </td>
       
           </tr>
       @endforeach

    </tbody>
</table>
@endsection

