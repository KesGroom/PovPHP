@extends('layouts.app')
@section('content')
@section('nav')
    @include('layouts.partials.dashNav')

    @if (session('status'))
        @section('script')
            @include('layouts.partials.alerts',[
            'option' => session('status'),
            ])
        @endsection
    @endif
@endsection
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('pov.newPQRS') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('pqrs.store') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="asunto"
                                class="col-md-12 col-form-label text-md-left">{{ __('pov.txtAsunto') }}</label>

                            <div class="col-md-12">
                                <textarea id="asunto" rows="6"
                                    class="form-control @error('asunto') is-invalid @enderror" name="asunto"
                                    value="{{ old('asunto') }}" required autocomplete="asunto" autofocus></textarea>

                                @error('asunto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class=" ">
                            <label for="categoria">{{ __('pov.txtCategory') }}</label>
                            <select class="form-control" id="categoria" name="categoria" required>
                                <option value="Pregunta">{{ __('pov.txtPregunta') }}</option>
                                <option value="Queja">{{ __('pov.txtQueja') }}</option>
                                <option value="Reclamo">{{ __('pov.txtReclamo') }}</option>
                                <option value="Sugerencia">{{ __('pov.txtSugerencia') }}</option>
                            </select>
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-MC btn-footer">
                                {{ __('pov.txtSend') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <h3>{{ __('pov.tltMisPQRS') }}</h3>
            @include('pages.pqrs.list',[
                'pqrsList' => $myPQRS,
                'coorView' => 'false',
            ])
        </div>
    </div>
</div>
@endsection
