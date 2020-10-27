@extends('layouts.app')
@section('content')
    <div class="col-md-12 col-sd-12 mt-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">{{ __('pov.infoContacto') }}</h5>
            </div>
            <form method="POST" action="{{ route('userPages.updateInfo', $usuario) }}">
                @csrf
                @method('put')
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="form-group row">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-right">{{ __('pov.txtEmail') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ $usuario->email }}" required autocomplete="email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="form-group row">
                            <label for="direccion"
                                class="col-md-4 col-form-label text-md-right">{{ __('pov.txtAddress') }}</label>

                            <div class="col-md-6">
                                <input id="direccion" type="text"
                                    class="form-control @error('direccion') is-invalid @enderror" name="direccion"
                                    value="{{ $usuario->direccion }}" required autocomplete="direccion">

                                @error('direccion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="form-group row">
                            <label for="celular"
                                class="col-md-4 col-form-label text-md-right">{{ __('pov.txtCellPhone') }}</label>

                            <div class="col-md-6">
                                <input id="celular" type="text" class="form-control @error('celular') is-invalid @enderror"
                                    name="celular" value="{{ $usuario->celular }}" required autocomplete="celular">

                                @error('celular')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="form-group row">
                            <label for="telefono_fijo"
                                class="col-md-4 col-form-label text-md-right">{{ __('pov.txtPhone') }}</label>

                            <div class="col-md-6">
                                <input id="telefono_fijo" type="text"
                                    class="form-control @error('telefono_fijo') is-invalid @enderror" name="telefono_fijo"
                                    value="{{ $usuario->telefono_fijo }}" required autocomplete="telefono_fijo">

                                @error('telefono_fijo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </li>
                </ul>
                <button type="submit" class="btn btn-MC btn-block btn-footer">
                    {{ __('pov.update') }}
                </button>
            </form>
        </div>
    </div>
@endsection
