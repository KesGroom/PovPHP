@extends('layouts.app')
@section('content')
@section('nav')
    @include('layouts.partials.dashNav')
@endsection
@if (session('status'))
    @section('script')
        @include('layouts.partials.alerts',[
        'option' => session('status'),
        ])
    @endsection
@endif
<div class="container mb-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header"><i class="fas fa-people-carry mr-2"></i>{{ __('pov.edit') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('zonas.update', $zona) }}">
                        @csrf
                        <div class="form-group row">
                            <label for="nombre_zona"
                                class="col-md-12 col-form-label text-md-left">{{ __('pov.txtNombZona') }}</label>
                            <div class="col-md-12">
                                <input id="nombre_zona" type="text"
                                    class="form-control @error('nombre_zona') is-invalid @enderror" name="nombre_zona"
                                    value="{{ $zona->nombre_zona }}" required autocomplete="nombre_zona" autofocus>

                                @error('nombre_zona')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lugar"
                                class="col-md-12 col-form-label text-md-left">{{ __('pov.txtLugar') }}</label>
                            <div class="col-md-12">
                                <input id="lugar" type="text" class="form-control @error('lugar') is-invalid @enderror"
                                    name="lugar" value="{{ $zona->lugar }}" required autocomplete="lugar" autofocus>

                                @error('lugar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="encargado"
                                class="col-md-12 col-form-label text-md-left">{{ __('pov.txtEncargado') }}</label>
                            <div class="col-md-12">
                                <input id="encargado" type="text"
                                    class="form-control @error('encargado') is-invalid @enderror" name="encargado"
                                    value="{{ $zona->encargado }}" required autocomplete="encargado" autofocus>

                                @error('encargado')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <h5>{{ __('pov.txtHorarios') }}</h5>
                        <div class="form-group row">
                            <label for="hora_entrada"
                                class="col-md-12 col-form-label text-md-left">{{ __('pov.txtEntrada') }}</label>
                            <div class="col-md-12">
                                <input id="hora_entrada" type="time"
                                    class="form-control @error('hora_entrada') is-invalid @enderror" name="hora_entrada"
                                    value="{{ $zona->hora_entrada }}" required autocomplete="hora_entrada" autofocus>

                                @error('hora_entrada')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="hora_salida"
                                class="col-md-12 col-form-label text-md-left">{{ __('pov.txtSalida') }}</label>
                            <div class="col-md-12">
                                <input id="hora_salida" type="time"
                                    class="form-control @error('hora_salida') is-invalid @enderror" name="hora_salida"
                                    value="{{ $zona->hora_salida }}" required autocomplete="hora_salida" autofocus>

                                @error('hora_salida')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tiempo_servicio"
                                class="col-md-12 col-form-label text-md-left">{{ __('pov.txtHrsService') }}</label>
                            <div class="col-md-12">
                                <input id="tiempo_servicio" type="text"
                                    class="form-control @error('tiempo_servicio') is-invalid @enderror"
                                    name="tiempo_servicio" value="{{ $zona->tiempo_servicio }}" required
                                    autocomplete="tiempo_servicio" autofocus>

                                @error('tiempo_servicio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cupos"
                                class="col-md-12 col-form-label text-md-left">{{ __('pov.txtCupos') }}</label>
                            <div class="col-md-12">
                                <input id="cupos" type="text"
                                    class="solo-numero form-control @error('cupos') is-invalid @enderror" name="cupos"
                                    value="{{ $zona->cupos }}" required autocomplete="cupos" autofocus>

                                @error('cupos')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="labores"
                                class="col-md-12 col-form-label text-md-left">{{ __('pov.txtLabores') }}</label>
                            <div class="col-md-12">
                                <textarea id="labores" rows="6"
                                    class="form-control @error('labores') is-invalid @enderror" name="labores" required
                                    autocomplete="labores" autofocus>{{ $zona->labores }}
                                </textarea>
                                @error('labores')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="dias_servicio"
                                class="col-md-12 col-form-label text-md-left">{{ __('pov.txtDiasServ') }}</label>
                            <div class="col-md-12">
                                <input id="dias_servicio" type="text" placeholder="{{ __('pov.txtExampleDays') }}"
                                    class="form-control @error('dias_servicio') is-invalid @enderror"
                                    name="dias_servicio" value="{{ $zona->dias_servicio }}" required
                                    autocomplete="dias_servicio" autofocus>

                                @error('dias_servicio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                </div>
                <div class="">
                    <button type="submit" class="btn btn-MC btn-footer">
                        {{ __('pov.edit') }}
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="mt-6"></div>
@endsection
