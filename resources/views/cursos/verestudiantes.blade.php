


@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{$docente_curso}}
            <form method="POST" action="{{ route('asistencias.store') }}">
                @csrf
                <input id="docente_curso" type="hidden" class="form-control @error('docente_curso') is-invalid @enderror" name="docente_curso" value="{{$docente_curso}}" required autocomplete="curso" autofocus readonly>
                <div class="form-group row">
                    <label for="tema_trabajado" class="col-md-4 col-form-label text-md-right">Tema trabajado</label>

                    <div class="col-md-6">
                        <input id="tema_trabajado" type="tema_trabajado" class="form-control @error('tema_trabajado') is-invalid @enderror" name="tema_trabajado" value="{{ old('tema_trabajado') }}" required autocomplete="tema_trabajado" autofocus>

                        @error('tema_trabajado')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class=" ">
                    <label for="periodo">Periodo</label>
                    <select  class="form-control" id="periodo" name="periodo"  required>
                       @foreach ($periodos as $periodo)
                       <option value="{{$periodo->id}}">{{$periodo->numero_periodo}}<option>
                       @endforeach
                    </select>
                </div>
            <table  class="table">
                <thead>
<th>nombre</th>
<th>Apellido</th>
<th>asistencia</th>
<th>observacion</th>
                </thead>
                <tbody>
     
                    @foreach($estudiantes as $pepe)
                  
                    <tr>
                     <td>{{$pepe->user->name}}</td>
                     <td>{{$pepe->user->apellido}}</td>
                     <td>
                        <div class=" ">
                            <select  class="form-control" id="A{{$pepe->id}}" name="A{{$pepe->id}}"  required>
                                <option value="Presente">'Presente<option>
                                <option value="Ausente">'Ausente<option>
                                <option value="Retardo">Retardo<option>
                            </select>
                        </div>
                     </td>
                      <td>
                        <input id="id" type="hidden" class="form-control @error('id') is-invalid @enderror" name="{{$pepe->id}}" value="{{$pepe->id}}" required autocomplete="id" autofocus  readonly>
                        
                        <div class="form-group row">
                            <input id="observaciones" type="text" class="form-control @error('id') is-invalid @enderror" name="B{{$pepe->id}}" value=""  >
                            <div class="col-md-6">
                               
                                @error('observaciones')
                                    <span class="invalname-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                      </td>
                    </tr>
                    <input id="curso" type="hidden" class="form-control @error('curso') is-invalid @enderror" name="curso" value="{{$pepe->curso}}" required autocomplete="curso" autofocus  readonly>
                    @endforeach
                </tbody>
            </table>
            <button class="btn btn-primary">Registrar Asistencia</button>
        </form>
        </div>
    </div>
</div>
@endsection
