@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registrar Zona') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('zonas.store') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="nombre_zona" class="col-md-4 col-form-label text-md-right">nombre_zona</label>
                            <div class="col-md-6">
                                <input id="nombre_zona" type="text" class="form-control @error('nombre_zona') is-invalid @enderror" name="nombre_zona" value="{{ old('nombre_zona') }}" required autocomplete="nombre_zona" autofocus>

                                @error('nombre_zona')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lugar" class="col-md-4 col-form-label text-md-right">lugar</label>
                            <div class="col-md-6">
                                <input id="lugar" type="text" class="form-control @error('lugar') is-invalid @enderror" name="lugar" value="{{ old('lugar') }}" required autocomplete="lugar" autofocus>

                                @error('lugar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="encargado" class="col-md-4 col-form-label text-md-right">encargado</label>
                            <div class="col-md-6">
                                <input id="encargado" type="text" class="form-control @error('encargado') is-invalid @enderror" name="encargado" value="{{ old('encargado') }}" required autocomplete="encargado" autofocus>

                                @error('encargado')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="hora_entrada" class="col-md-4 col-form-label text-md-right">hora_entrada</label>
                            <div class="col-md-6">
                                <input id="hora_entrada" type="time" class="form-control @error('hora_entrada') is-invalid @enderror" name="hora_entrada" value="{{ old('hora_entrada') }}" required autocomplete="hora_entrada" autofocus>

                                @error('hora_entrada')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tiempo_servicio" class="col-md-4 col-form-label text-md-right">hora_salida</label>
                            <div class="col-md-6">
                                <input id="hora_salida" type="time" class="form-control @error('hora_salida') is-invalid @enderror" name="hora_salida" value="{{ old('hora_salida') }}" required autocomplete="hora_salida" autofocus>

                                @error('hora_salida')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tiempo_servicio" class="col-md-4 col-form-label text-md-right">tiempo_servicio</label>
                            <div class="col-md-6">
                                <input id="tiempo_servicio" type="text" class="form-control @error('tiempo_servicio') is-invalid @enderror" name="tiempo_servicio" value="{{ old('tiempo_servicio') }}" required autocomplete="tiempo_servicio" autofocus>

                                @error('tiempo_servicio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cupos" class="col-md-4 col-form-label text-md-right">cupos</label>
                            <div class="col-md-6">
                                <input id="cupos" type="text" class="form-control @error('cupos') is-invalid @enderror" name="cupos" value="{{ old('cupos') }}" required autocomplete="cupos" autofocus>

                                @error('cupos')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="labores" class="col-md-4 col-form-label text-md-right">labores</label>
                            <div class="col-md-6">
                                <input id="labores" type="text" class="form-control @error('labores') is-invalid @enderror" name="labores" value="{{ old('labores') }}" required autocomplete="labores" autofocus>

                                @error('labores')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="dias_servicio" class="col-md-4 col-form-label text-md-right">dias_servicio</label>
                            <div class="col-md-6">
                                <input id="dias_servicio" type="text" class="form-control @error('dias_servicio') is-invalid @enderror" name="dias_servicio" value="{{ old('dias_servicio') }}" required autocomplete="dias_servicio" autofocus>

                                @error('dias_servicio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
