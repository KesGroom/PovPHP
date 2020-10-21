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
                    <form method="POST" action="{{ route('grados.store') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="nombre_grado" class="col-md-4 col-form-label text-md-right">Nombre grado</label>

                            <div class="col-md-6">
                                <input id="nombre_grado" type="text" class="form-control @error('nombre_grado') is-invalid @enderror" name="nombre_grado" value="{{ old('nombre_grado') }}" required autocomplete="nombre_grado" autofocus>

                                @error('nombre_grado')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class=" ">
                            <label for="nivel_educativo">Nivel educativo</label>
                            <select  class="form-control" id="nivel_educativo" name="nivel_educativo"  required>
                                <option value="Primaria">Primaria<option>
                                <option value="Secundaria">Secundaria<option>
                                <option value="Media">Media<option>
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
