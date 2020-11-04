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
                    <form method="POST" action="{{ route('materias.store') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="nombre_materia" class="col-md-4 col-form-label text-md-right">Nombre materia</label>

                            <div class="col-md-6">
                                <input id="nombre_materia" type="text" class="form-control @error('nombre_materia') is-invalid @enderror" name="nombre_materia" value="{{ old('nombre_materia') }}" required autocomplete="nombre_materia" autofocus>

                                @error('nombre_materia')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class=" ">
                            <label for="area">Area</label>
                            <select  class="form-control" id="area" name="area"  required>
                                @foreach ($areas as $area)
                                    <option value="{{$area->id}}">{{$area->nombre_area}}</option>
                                @endforeach
                            </select>
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
