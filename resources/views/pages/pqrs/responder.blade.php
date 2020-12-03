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
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    @if ($pqrs->respuesta)
                        {{ __('pov.txtEditAnswer') }}
                    @else
                        {{ __('pov.txtResponder') }}
                    @endif
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('pqrs.update', $pqrs) }}">
                        @method('PUT')
                        @csrf
                        <div class="form-group row">
                            <label for="respuesta"
                                class="col-md-12 col-form-label text-md-left">{{ __('pov.txtRespuesta') }}</label>

                            <div class="col-md-12">
                                <textarea id="respuesta" rows="6"
                                    class="form-control @error('respuesta') is-invalid @enderror" name="respuesta"
                                    value="{{ $pqrs->respuesta }}" required autocomplete="respuesta"
                                    autofocus>{{ $pqrs->respuesta }}
                                </textarea>
                                @error('respuesta')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-MC btn-footer">
                                @if ($pqrs->respuesta)
                                    {{ __('pov.txtEditAnswer') }}
                                @else
                                    {{ __('pov.txtResponder') }}
                                @endif
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
