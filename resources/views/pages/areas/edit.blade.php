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
            <div class="card mt-6">
                <div class="card-header">
                    <ion-icon name="school" class="mr-4"></ion-icon>{{ __('pov.edit') }}
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('areas.update', $area) }}">
                        @method('PUT')
                        @csrf
                        <div class="form-group row">
                            <label for="nombre_area"
                                class="col-md-12 mt-2 mb-2 col-form-label text-md-left">{{ __('pov.addArea') }}</label>

                            <div class="col-md-12 mb-4">
                                <input id="nombre_area" type="text"
                                    class="form-control @error('nombre_area') is-invalid @enderror" name="nombre_area"
                                    value="{{ $area->nombre_area }}" required autocomplete="nombre_area" autofocus>

                                @error('nombre_area')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-2">
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
