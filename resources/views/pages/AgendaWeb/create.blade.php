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
                    <div class="card-header"><i class="fas fa-address-book mr-3"></i>Registrar observación</div>               
                    <div class="card-body">
                        <form method="POST" action="{{ route('agendaWeb.store') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="categoria"
                                    class="col-md-12 col-form-label text-md-left">Categoria</label>
                                <div class="col-md-12">
                                    <input id="categoria" type="text"
                                        class="form-control @error('categoria') is-invalid @enderror"
                                        name="categoria" value="" required autocomplete="categoria" autofocus>
    
                                    @error('categoria')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="descripcion"
                                    class="col-md-12 col-form-label text-md-left">Descripción</label>
                                <div class="col-md-12">
                                    <textarea id="descripcion" rows="4"
                                        class="form-control @error('descripcion') is-invalid @enderror" name="descripcion"
                                        value="{{ old('descripcion') }}" required autocomplete="descripcion" autofocus></textarea>
                                    @error('descripcion')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="docente_curso"
                                    class="col-md-12 col-form-label text-md-left">Docente curso</label>
                                <div class="col-md-12">
                                    <textarea id="docente_curso" rows="2"
                                        class="form-control @error('docente_curso') is-invalid @enderror"
                                        name="docente_curso" value="{{ old('docente_curso') }}" autocomplete="docente_curso"
                                        autofocus></textarea>
    
                                    @error('docente_curso')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="estudiante"
                                    class="col-md-12 col-form-label text-md-left">Estudiante</label>
                                <div class="col-md-12">
                                    <textarea id="estudiante" rows="2"
                                        class="form-control @error('estudiante') is-invalid @enderror"
                                        name="estudiante" value="{{ old('estudiante') }}" autocomplete="estudiante"
                                        autofocus></textarea>
    
                                    @error('estudiante')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="actividad"
                                    class="col-md-12 col-form-label text-md-left">Actividad</label>
                                <div class="col-md-12">
                                    <textarea id="actividad" rows="2"
                                        class="form-control @error('actividad') is-invalid @enderror"
                                        name="actividad" value="{{ old('actividad') }}" autocomplete="actividad"
                                        autofocus></textarea>
    
                                    @error('actividad')
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