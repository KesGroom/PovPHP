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
                <div class="card-header"><i class="fas fa-address-book mr-3"></i>Agregar una nueva area</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('area.store') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="nombre_area" class="col-md-12 col-form-label text-md-left">{{ __('pov.addArea') }}</label>
                            <div class="col-md-12">
                                <input id="nombre_area" type="text"
                                    class="form-control @error('nombre_area') is-invalid @enderror" name="nombre_area"
                                    value="" required autocomplete="nombre_area" autofocus>

                                @error('nombre_area')
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
