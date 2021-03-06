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
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header"><i class="fas fa-address-book mr-3"></i>{{ __('pov.tltRegisterBit') }}</div>
                <div class="card-header displayRowSbC">
                    <div class="card-text">
                        <i class="fas fa-user-circle mr-2"></i>{{ $sala->estu->user->name }}
                        {{ $sala->estu->user->apellido }}
                    </div>
                    <div class="card-text">
                        <i class="fas fa-people-carry mr-2"></i>
                        {{ $sala->zonaSS->nombre_zona }}
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('bitacora.store', $sala) }}">
                        @csrf
                        <div class="form-group row">
                            <label for="tiempo_prestado"
                                class="col-md-12 col-form-label text-md-left">{{ __('pov.txtTiempoPrestado') }}</label>
                            <div class="col-md-12">
                                <input id="tiempo_prestado" type="number" min="0" max="{{ $max }}"
                                    class="solo-numero form-control @error('tiempo_prestado') is-invalid @enderror"
                                    name="tiempo_prestado" value="1" required autocomplete="tiempo_prestado" autofocus>

                                @error('tiempo_prestado')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="labores"
                                class="col-md-12 col-form-label text-md-left">{{ __('pov.txtLaboresRealizadas') }}</label>
                            <div class="col-md-12">
                                <textarea id="labores" rows="4"
                                    class="form-control @error('labores') is-invalid @enderror" name="labores"
                                    value="{{ old('labores') }}" required autocomplete="labores" autofocus></textarea>
                                @error('labores')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="observaciones"
                                class="col-md-12 col-form-label text-md-left">{{ __('pov.txtObservaciones') }}
                                ({{ __('pov.optional') }})</label>
                            <div class="col-md-12">
                                <textarea id="observaciones" rows="2"
                                    class="form-control @error('observaciones') is-invalid @enderror"
                                    name="observaciones" value="{{ old('observaciones') }}" autocomplete="observaciones"
                                    autofocus></textarea>

                                @error('observaciones')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-MC btn-footer">
                            {{ __('pov.register') }}
                        </button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
