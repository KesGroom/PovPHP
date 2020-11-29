@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('pqrs.update' , $pqrs) }}">
              @method('PUT')
                            @csrf
                        <div class="form-group row">
                            <label for="respuesta" class="col-md-4 col-form-label text-md-right">Respuesta</label>

                            <div class="col-md-6">
                                <input id="respuesta" type="text" class="form-control @error('respuesta') is-invalid @enderror" name="respuesta" value="{{ $pqrs->respuesta}}" required autocomplete="respuesta" autofocus>

                                @error('respuesta')
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
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
