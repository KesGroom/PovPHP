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
                    <form method="POST" action="{{ route('citas.storeArea') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="hora" class="col-md-4 col-form-label text-md-right">hora</label>

                            <div class="col-md-6">
                                <input id="hora" type="time" class="form-control @error('hora') is-invalid @enderror" name="hora" value="{{ old('hora') }}" required autocomplete="hora" autofocus>

                                @error('hora')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="atencion_area">atencion Area</label>
                            <select  class="form-control" id="atencion_area" name="atencion_area" required onchange="ddlselect();">
                                @foreach ($atencion_area as $item)
                                <option value="{{$item->id}}"><strong>hora inicio atencion:</strong>  {{$item->hora_inicio_atencion}} <strong>hora final atencion:</strong>    {{$item->hora_final_atencion}}</option>
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
