@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registrar bitacora') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('bitacora.store') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="tiempo_prestado" class="col-md-4 col-form-label text-md-right">tiempo_prestado</label>
                            <div class="col-md-6">
                                <input id="tiempo_prestado" type="text" class="form-control @error('tiempo_prestado') is-invalid @enderror" name="tiempo_prestado" value="{{ old('tiempo_prestado') }}" required autocomplete="tiempo_prestado" autofocus>

                                @error('tiempo_prestado')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="observaciones" class="col-md-4 col-form-label text-md-right">observaciones</label>
                            <div class="col-md-6">
                                <input id="observaciones" type="text" class="form-control @error('observaciones') is-invalid @enderror" name="observaciones" value="{{ old('observaciones') }}" required autocomplete="observaciones" autofocus>

                                @error('observaciones')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cantidad_labores" class="col-md-4 col-form-label text-md-right">cantidad_labores</label>
                            <div class="col-md-6">
                                <input id="cantidad_labores" type="text" class="form-control @error('cantidad_labores') is-invalid @enderror" name="cantidad_labores" value="{{ old('cantidad_labores') }}" required autocomplete="cantidad_labores" autofocus>

                                @error('cantidad_labores')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="coordinador" class="col-md-4 col-form-label text-md-right">coordinador</label>
                            <div class="col-md-6">
                                <input id="coordinador" type="text" class="form-control @error('coordinador') is-invalid @enderror" name="coordinador" value="{{ old('coordinador') }}" required autocomplete="coordinador" autofocus>

                                @error('coordinador')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sala_servicio" class="col-md-4 col-form-label text-md-right">sala_servicio</label>
                            <div class="col-md-6">
                                <input id="sala_servicio" type="text" class="form-control @error('sala_servicio') is-invalid @enderror" name="sala_servicio" value="{{ old('sala_servicio') }}" required autocomplete="sala_servicio" autofocus>

                                @error('sala_servicio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
