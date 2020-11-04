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
                            <label for="fecha_cita" class="col-md-4 col-form-label text-md-right">fecha_cita</label>

                            <div class="col-md-6">
                                <input id="fecha_cita" type="date" class="form-control @error('fecha_cita') is-invalid @enderror" name="fecha_cita" value="{{ old('fecha_cita') }}" required autocomplete="fecha_cita" autofocus>

                                @error('fecha_cita')
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
                        <form action="trataformulario.php" method="POST">   
                            Nombre: <input type="text" name="nombre"><br>   
                            Apellidos: <input type="text" name="apellidos"><br>   
                            Email: <input type="text" name="email"> <br>   
                            Cerveza: <br>   
                            <select multiple name="cerveza">    
                            <option value="SanMiguel">San Miguel</option>    
                            <option value="Mahou">Mahou</option>    
                            <option value="Heineken">Heineken</option>    
                            <option value="Carlsberg">Carlsberg</option>    
                            <option value="Aguila">Aguila</option>   
                            ...   
                            </select><br>   
                            <input type="submit" value="Enviar datos!" > 
                            </form>
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
