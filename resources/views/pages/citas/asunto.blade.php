@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">{{ __('Register') }}</div>
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>
    <span class="badge badge-pill badge-warning">Puede colocar o no  un asunto</span>
    <div class="card-body">
        <form method="POST" action="{{ route('citas.AgendarCita') }}">
            @csrf
            <div class="form-group row">
                <label for="asunto" class="col-md-4 col-form-label text-md-right">Escriba Asunto</label>

                <div class="col-md-6">
                    <input id="asunto" type="text" class="form-control @error('asunto') is-invalid @enderror" name="asunto" value="{{ old('asunto') }}" required autocomplete="asunto" autofocus>

                    @error('asunto')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
  <input id="id_cita" type="hidden" name="id_cita" value="{{$id_cita}}" readonly>
            </div>
            <button type="submit" class="btn btn-primary">Registarme en esta Cita</button>
        </form>
    </div>
</div>
@endsection