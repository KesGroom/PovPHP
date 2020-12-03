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
                <div class="card-header">
                    <ion-icon name="library" class="mr-4"></ion-icon>{{ __('pov.edit') }}
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('materias.update', $materias) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="nombre_materia"
                                class="col-md-12 col-form-label text-md-left">{{ __('pov.addMat') }}</label>

                            <div class="col-md-12">
                                <input id="nombre_materia" type="text"
                                    class="form-control @error('nombre_materia') is-invalid @enderror"
                                    name="nombre_materia" value="{{ $materias->nombre_materia }}" required
                                    autocomplete="nombre_materia" autofocus>

                                @error('nombre_materia')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class=" ">
                            <label for="area">{{ __('pov.txtArea') }}</label>
                            <select class="form-control" id="area" name="area" required>
                                @foreach ($areas as $area)
                                    @if ($materias->area == $area->id)
                                        <option selected value="{{ $area->id }}">{{ $area->nombre_area }}</option>
                                    @else
                                        <option value="{{ $area->id }}">{{ $area->nombre_area }}</option>
                                    @endif
                                @endforeach
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
