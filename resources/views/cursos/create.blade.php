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
                    <form method="POST" action="{{ route('cursosito.store') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="curso" class="col-md-4 col-form-label text-md-right">curso</label>

                            <div class="col-md-6">
                                <input id="curso" type="text" class="form-control @error('curso') is-invalid @enderror" name="curso" value="{{ old('curso') }}" required autocomplete="curso" autofocus>

                                @error('curso')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="salon" class="col-md-4 col-form-label text-md-right">salon</label>

                            <div class="col-md-6">
                                <input id="salon" type="text" class="form-control @error('salon') is-invalid @enderror" name="salon" value="{{ old('salon') }}" required autocomplete="salon" autofocus>

                                @error('salon')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class=" ">
                            <label for="grado">Grado</label>
                            <select  class="form-control" id="grado" name="grado" required>
                                @foreach ($grados as $grado)
                                <option value="{{$grado->id}}">{{$grado->nombre_grado}}<option>
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
