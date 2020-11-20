@extends('layouts.app')

@section('content')
@section('nav')
    @include('layouts.partials.backNav')
@endsection
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('pov.confirmPass') }}</div>

                <ul class="list-group list-group-flush">
                    <li class="list-group-item">{{ __('pov.passToContinue') }}</li>
                </ul>
                <div class="card-body">
                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-right">{{ __('pov.txtPassword') }}</label>
                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('pov.txtForget') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                        <button type="submit" class="btn btn-MC btn-footer">
                            {{ __('pov.confirmPass') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
