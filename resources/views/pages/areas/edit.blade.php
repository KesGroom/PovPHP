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
                    <form method="POST" action="{{ route('areas.update' , $area) }}">
              @method('PUT')
                        @csrf
                        <div class="form-group row">
                            <label for="nombre_area" class="col-md-4 col-form-label text-md-right">Nombre area</label>

                            <div class="col-md-6">
                                <input id="nombre_area" type="text" class="form-control @error('nombre_area') is-invalid @enderror" name="nombre_area" value="{{ $area->nombre_area}}" required autocomplete="nombre_area" autofocus>

                                @error('nombre_area')
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
