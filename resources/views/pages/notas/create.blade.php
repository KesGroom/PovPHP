@extends('layouts.app')
@section('content')

Docente curso:{{$docente_curso}}
actividad = {{$actividad}}
<form method="POST" action="{{ route('notas.store') }}">
    @csrf
    <div class=" ">
        <label for="periodo">Periodo</label>
        <select  class="form-control" id="periodo" name="periodo"  required>
           @foreach ($periodos as $periodo)
           <option value="{{$periodo->id}}">{{$periodo->numero_periodo}}</option>
           @endforeach
        </select>
    </div>
    <div class="form-group row">
        <label for="fecha_entrega" class="col-md-4 col-form-label text-md-right">Fecha de entrega</label>

        <div class="col-md-6">
            <input id="fecha_entrega" type="date" class="form-control @error('fecha_entrega') is-invalid @enderror" name="fecha_entrega" value="{{ old('fecha_entrega') }}" required autocomplete="fecha_entrega" autofocus>

            @error('fecha_entrega')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <table  class="table">
        <thead>
<th>nombre</th>
<th>Apellido</th>
        </thead>
        <tbody>

            @foreach($estudiantes as $pepe)
          
            <tr>
             <td>{{$pepe->user->name}}</td>
             <td>{{$pepe->user->apellido}}</td>
             <td>
                 {{-- id del estudiante --}}
                <input id="id" type="hidden" class="form-control @error('id') is-invalid @enderror" name="{{$pepe->id}}" value="{{$pepe->id}}" required autocomplete="id" autofocus  readonly>
                
                    <input id="calificacion" type="number" step="0.1"  class="form-control @error('id') is-invalid @enderror" name="A{{$pepe->id}}" value=""  >
                    <div class="col-md-6">
                       
                        @error('calificacion')
                            <span class="invalname-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
            
              </td>
              
            </tr>
            @endforeach
        </tbody>
    </table>
    {{-- inputs para curso y actividad --}}
    <input id="curso" type="hidden" class="form-control @error('curso') is-invalid @enderror" name="curso" value="{{$curso}}" required autocomplete="curso" autofocus  readonly>
    <input id="actividad" type="hidden" class="form-control @error('actividad') is-invalid @enderror" name="actividad" value="{{$actividad}}" required autocomplete="actividad" autofocus  readonly>
    <button class="btn btn-primary" type="submit">Registrar Nota</button>
</form>
@endsection