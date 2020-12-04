@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header displayRowIniC">
        <ion-icon name="school" class="mr-4"></ion-icon>{{ __('pov.registerArea') }}
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('areas.store') }}">
            @csrf
            <div class="form-group row">
                <label for="nombre_area"
                    class="col-md-12 col-form-label text-md-left mb-2 ">{{ __('pov.addArea') }}</label>
                <div class="col-md-12 mt-2 mb-2">
                    <input id="nombre_area" type="text" class="form-control @error('nombre_area') is-invalid @enderror"
                        name="nombre_area" required autocomplete="nombre_area" autofocus>

                    @error('nombre_area')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="mt-2">
                <button type="submit" class="btn btn-MC btn-footer">
                    {{ __('pov.register') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection