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
                <div class="card-header"><ion-icon name="people-circle" class="mr-4"></ion-icon>{{ __('pov.edit') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('grados.update', $grado) }}">
                        @csrf
                        @method('put')
                        <div class="form-group row">
                            <label for="nombre_grado"
                                class="col-md-12 col-form-label text-md-left">{{ __('pov.txtGrade') }}</label>

                            <div class="col-md-12">
                                <input id="nombre_grado" type="text"
                                    class="form-control @error('nombre_grado') is-invalid @enderror" name="nombre_grado"
                                    value="{{ $grado->nombre_grado }}" required autocomplete="nombre_grado" autofocus>

                                @error('nombre_grado')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class=" ">
                            <label for="nivel_educativo">{{ __('pov.txtNivel') }}</label>
                            <select class="form-control" id="nivel_educativo" name="nivel_educativo" required>
                                @if ($grado->nivel_educativo == 'Primaria')
                                    <option selected value="Primaria">{{ __('pov.txtPrimaria') }}
                                    </option>
                                @else
                                    <option value="Primaria">{{ __('pov.txtPrimaria') }}
                                    </option>
                                @endif
                                @if ($grado->nivel_educativo == 'Secundaria')
                                    <option selected value="Secundaria">{{ __('pov.txtSecundaria') }}
                                    </option>
                                @else
                                    <option value="Secundaria">{{ __('pov.txtSecundaria') }}
                                    </option>
                                @endif
                                @if ($grado->nivel_educativo == 'Media')
                                    <option selected value="Media">{{ __('pov.txtMedia') }}
                                    </option>
                                @else
                                    <option value="Media">{{ __('pov.txtMedia') }}
                                    </option>
                                @endif
                            </select>
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-MC btn-footer">
                                {{ __('pov.edit') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
