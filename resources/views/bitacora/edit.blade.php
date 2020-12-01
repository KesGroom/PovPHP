@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Editar bitacora') }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('bitacora.update', $bita) }}">
                            @csrf
                         
                            <div class="form-group row">
                                <label for="tiempo_prestado"
                                    class="col-md-4 col-form-label text-md-right">tiempo_prestado</label>
                                <div class="col-md-6">
                                    <input id="tiempo_prestado" type="text"
                                        class="solo-numero form-control @error('tiempo_prestado') is-invalid @enderror"
                                        name="tiempo_prestado" value="{{$bita->tiempo_prestado}}" required
                                        autocomplete="tiempo_prestado" autofocus>

                                    @error('tiempo_prestado')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="observaciones"
                                    class="col-md-4 col-form-label text-md-right">observaciones</label>
                                <div class="col-md-6">
                                    <input id="observaciones" type="text"
                                        class="form-control @error('observaciones') is-invalid @enderror"
                                        name="observaciones" value="{{$bita->observaciones}}" required
                                        autocomplete="observaciones" autofocus>

                                    @error('observaciones')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="cantidad_labores"
                                    class="col-md-4 col-form-label text-md-right">cantidad_labores</label>
                                <div class="col-md-6">
                                    <input id="cantidad_labores" type="text"
                                        class="form-control @error('cantidad_labores') is-invalid @enderror"
                                        name="cantidad_labores" value="{{$bita->cantidad_labores}}" required
                                        autocomplete="cantidad_labores" autofocus>

                                    @error('cantidad_labores')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <button type="submit" class="btn btn-MC btn-footer">
                                {{ __('Register') }}
                            </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
