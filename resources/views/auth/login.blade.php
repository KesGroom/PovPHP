<style>


</style>
@extends('layouts.app')

@section('content')
    @include('layouts.partials.backNav')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('pov.login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="user"
                                    class="col-md-4 col-form-label text-md-right">{{ __('pov.txtDocumentNumber') }}</label>

                                <div class="col-md-6">
                                    <input id="user" type="text"
                                        class="solo-numero form-control @error('user') is-invalid @enderror" name="id"
                                        value="{{ old('id') }}" required autocomplete="id" autofocus>

                                    @error('user')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

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

                            <div class="form-group row">
                                <div class="col-md-5 offset-md-1">
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('pov.forgot') }}
                                        </a>
                                    @endif
                                </div>
                                <div class="col-md-5 offset-md-1">
                                    <div class="form-check Check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('pov.remember') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-MC btn-footer btn-block">
                                {{ __('pov.login') }}
                            </button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
