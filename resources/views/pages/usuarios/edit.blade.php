@extends('layouts.app')

@section('content')
    @include('layouts.partials.dashNav')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="container containerMain">

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('pov.editarReg') }}</div>
                    <form method="POST" action="{{ route('usuarios.update', $usuario) }}">
                        @csrf
                        @method('put')
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="form-group row">
                                    <label for="id"
                                        class="col-md-4 col-form-label text-md-right">{{ __('pov.txtDocumentNumber') }}</label>

                                    <div class="col-md-6">
                                        <input id="id" type="text" class="form-control @error('id') is-invalid @enderror"
                                            name="id" value="{{ $usuario->id }}" required autocomplete="id" autofocus>

                                        @error('id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="form-group row">
                                    <label for="name"
                                        class="col-md-4 col-form-label text-md-right">{{ __('pov.txtNombre') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ $usuario->name }}" required autocomplete="name" autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="form-group row">
                                    <label for="apellido"
                                        class="col-md-4 col-form-label text-md-right">{{ __('pov.txtApellido') }}</label>

                                    <div class="col-md-6">
                                        <input id="apellido" type="text"
                                            class="form-control @error('apellido') is-invalid @enderror" name="apellido"
                                            value="{{ $usuario->apellido }}" required autocomplete="apellido" autofocus>

                                        @error('apellido')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="form-group row">
                                    <label for="email"
                                        class="col-md-4 col-form-label text-md-right">{{ __('pov.txtEmail') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="text"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ $usuario->email }}" required autocomplete="email" autofocus>

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
                                    <label for="fecha_nacimiento"
                                        class="col-md-4 col-form-label text-md-right">{{ __('pov.txtFechaNacimiento') }}</label>

                                    <div class="col-md-6">
                                        <input id="fecha_nacimiento" type="date"
                                            class="form-control @error('fecha_nacimiento') is-invalid @enderror"
                                            name="fecha_nacimiento" value="{{ $usuario->fecha_nacimiento }}" required
                                            autocomplete="fecha_nacimiento" autofocus>

                                        @error('fecha_nacimiento')
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
                                            value="{{ $usuario->direccion }}" required autocomplete="direccion" autofocus>

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
                                        <input id="celular" type="text"
                                            class="form-control @error('celular') is-invalid @enderror" name="celular"
                                            value="{{ $usuario->celular }}" required autocomplete="celular" autofocus>

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
                                            class="form-control @error('telefono_fijo') is-invalid @enderror"
                                            name="telefono_fijo" value="{{ $usuario->telefono_fijo }}" required
                                            autocomplete="telefono_fijo" autofocus>

                                        @error('telefono_fijo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="form-group row">
                                    <label for="tipo_documento"
                                        class="col-md-4 col-form-label text-md-right">{{ __('pov.txtTypeDocument') }}</label>
                                    <select class="form-control col-md-6" id="tipo_documento" name="tipo_documento"
                                        required>
                                        <option value="Cedula ciudadania">{{ __('pov.TDCedula') }}
                                        <option>
                                        <option value="Tarjeta de identidad">{{ __('pov.TDTarjeta') }}
                                        <option>
                                        <option value="Registro civil">{{ __('pov.TDCedulaEx') }}
                                        <option>
                                    </select>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="form-group row">
                                    <label for="genero"
                                        class="col-md-4 col-form-label text-md-right">{{ __('pov.txtGenero') }}</label>
                                    <select class="form-control col-md-6" id="genero" name="genero" required>
                                        <option value="Masculino">{{ __('pov.GenderMale') }}
                                        <option>
                                        <option value="Femenino">{{ __('pov.GenderFemale') }}
                                        <option>
                                    </select>
                                </div>
                            </li>
                        </ul>

                        <button type="submit" class="btn btn-MC btn-block btn-footer">
                            {{ __('pov.update') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
