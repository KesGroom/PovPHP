
@extends('layouts.app')
@section('content')
<h1>curso :{{$DC->id}}</h1>
<div class="card-body">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
</div>
<form method="POST" action="{{ route('actividades.store') }}">
    @csrf
    <div class="form-group row">
        <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre </label>

        <div class="col-md-6">
            <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" required autocomplete="nombre" autofocus>

            @error('nombre')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="identificador" class="col-md-4 col-form-label text-md-right">identificador </label>

        <div class="col-md-6">
            <input id="identificador" type="text" class="form-control @error('identificador') is-invalid @enderror" name="identificador" value="{{ old('identificador') }}" required autocomplete="identificador" autofocus>

            @error('identificador')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="descripcion" class="col-md-4 col-form-label text-md-right">descripcion </label>

        <div class="col-md-6">
            <input id="descripcion" type="text" class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" value="{{ old('descripcion') }}" required autocomplete="descripcion" autofocus>

            @error('descripcion')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="recursos" class="col-md-4 col-form-label text-md-right">recursos </label>

        <div class="col-md-6">
            <input id="recursos" type="text" class="form-control @error('recursos') is-invalid @enderror" name="recursos" value="{{ old('recursos') }}" required autocomplete="recursos" autofocus>

            @error('recursos')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class=" ">
        <select   class="form-control" id="categoria" name="categoria">
            <option value="Actividad en clase">Actividad en clase</option>
            <option value="Tarea">Tarea</option>
            <option value="Plan de mejoramiento">Plan de mejoramiento</option>
        </select>
    </div>

    {{-- Input del salon respectivo --}}
    <input id="docente_curso" type="hidden" class="form-control @error('docente_curso') is-invalid @enderror" name="docente_curso" value="{{$DC->id}}" required autocomplete="docente_curso" autofocus readonly>
    {{-- x --}}
    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                Registrar actividad 
            </button>
        </div>
    </div>
</form>


@endsection