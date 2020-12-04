@extends('layouts.app')

@section('content')
<style>
    .atencionArea{
        visibility: hidden;
    }
    .atencionCurso{
        visibility: hidden;
    }
</style>
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
                        <div>
                            <label for="tipo_atencion">Seleccione tipo de atencion</label>
                            <select  class="form-control" id="tipo_atencion" name="tipo_atencion" required onchange="ddlselect();">
                                <option value="1">-Seleccione uno-</option>
                               <option value="2">Atencion por area</option>
                               <option value="3">Atencion por curso</option>
                            </select>
                        </div>
                        <div class="form-group row atencionArea" id="Area">
                            <label for="atencion_area">atencion Area</label>
                            <select  class="form-control" id="atencion_area" name="atencion_area" required >
                                @foreach ($atencion_area as $item)
                                <option value="{{$item->id}}"><strong>hora inicio atencion:</strong>  {{$item->hora_inicio_atencion}} <strong>hora final atencion:</strong>    {{$item->hora_final_atencion}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group row atencionCurso" id="curso">
                            <label for="atencion_curso">atencion curso</label>
                           Atencion Curso
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
<script>
    function ddlselect(){
    var tipo_atencion = document.getElementById("tipo_atencion").value;
    var atencion_area = document.getElementById("Area");
    var atencion_curso = document.getElementById("curso");
    // alert(tipo_atencion);
    if (tipo_atencion == 1) {
        atencion_area.classList.add('atencionArea');
        atencion_curso.classList.add('atencionCurso');
    }
    if (tipo_atencion == 2) {
        atencion_curso.classList.add('atencionCurso');
        atencion_area.classList.remove('atencionArea');
    }
    if (tipo_atencion == 3) {
        atencion_area.classList.add('atencionArea');
        atencion_curso.classList.remove('atencionCurso');
    }
    }
    </script>
@endsection
