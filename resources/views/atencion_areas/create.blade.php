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
                    <form method="POST" action="{{ route('atencion_areas.store') }}"  id="form1">
                        @csrf
                        <div class=" ">
                            <label for="diaSemana">Dia de la semana</label>
                            <select  class="form-control" id="diaSemana" name="diaSemana"  required>
                                <option value="Lunes">Lunes<option>
                                <option value="Martes">Martes<option>
                                <option value="Miercoles">Miercoles<option>
                                <option value="'Jueves">'Jueves<option>
                                <option value="'Viernes">'Viernes<option>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label for="hora_inicio_atencion" class="col-md-4 col-form-label text-md-right">hora_inicio_atencion</label>

                            <div class="col-md-6">
                                <input id="hora_inicio_atencion" type="time" class="form-control @error('hora_inicio_atencion') is-invalid @enderror" name="hora_inicio_atencion" value="{{ old('hora_inicio_atencion') }}" required autocomplete="hora_inicio_atencion" autofocus>

                                @error('hora_inicio_atencion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="hora_final_atencion" class="col-md-4 col-form-label text-md-right">hora_final_atencion</label>

                            <div class="col-md-6">
                                <input id="hora_final_atencion" type="time" class="form-control @error('hora_final_atencion') is-invalid @enderror" name="hora_final_atencion" value="{{ old('hora_final_atencion') }}" required autocomplete="hora_final_atencion" autofocus>

                                @error('hora_final_atencion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class=" ">
                            <label for="area">Dia de la semana</label>
                            <select  class="form-control" id="area" name="area"  required>
                                <option value="Lunes">Lunes<option>
                            </select>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                        <input type="hidden" name="id" value="1">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.js"integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="crossorigin="anonymous"></script>
<script>
     var area = document.getElementById(id);
     var id = [];
       $(document).ready(function(area){
        $.ajax({
            url:'DocenteArea',
            method:'POST',
            data:$('#form1').serialize()
        }).done(function(res){
            var arreglo = JSON.parse(res);
          
            for(var x= 0;x<arreglo.length;x++){
               
                id.push(arreglo[x].id);
           
            }
            
         alert(id);

});

});
</script>
@endsection
