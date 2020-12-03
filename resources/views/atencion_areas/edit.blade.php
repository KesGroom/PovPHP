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
                    <form method="POST" action="{{ route('atencion_aa.update', $aa) }}">
                        @csrf
                        @method('put')
                            <label for="docentes">docentes</label>
                            <select  class="form-control" id="docentes" name="docentes" required onchange="ddlselect();">
                                @foreach ($docente as $docentes)
                                <option value="{{$docentes->docente}}">{{$docentes->mate->nombre_materia}}--{{$docentes->usuario->name}}--{{$docentes->cur->curso}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class=" ">
                            <label for="Area">Area</label>
                            <select  class="form-control" id="Area" name="Area" required >
                             
                            </select>
                        </div>
                        <div class="form-group row">
                            <label for="hora_inicio_atencion" class="col-md-4 col-form-label text-md-right">hora_inicio_atencion</label>

                            <div class="col-md-6">
                                <input id="hora_inicio_atencion" type="time" min="07:00" max="12:00" class="form-control @error('hora_inicio_atencion') is-invalid @enderror" name="hora_inicio_atencion" value="{{ old('hora_inicio_atencion') }}" required autocomplete="hora_inicio_atencion" autofocus>

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
                                <input id="hora_final_atencion" type="time" min="07:00" max="12:00"  class="form-control @error('hora_final_atencion') is-invalid @enderror" name="hora_final_atencion" value="{{ old('hora_final_atencion') }}" required autocomplete="hora_final_atencion" autofocus>

                                @error('hora_final_atencion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class=" ">
                            <label for="diaSemana">Dia de la semana</label>
                            <select  class="form-control" id="diaSemana" name="diaSemana"  required>
                                <option value="Lunes">Lunes</option>
                                <option value="Martes">Martes</option>
                                <option value="Miercoles">Miercoles</option>  
                                <option value="Jueves">Jueves</option>
                                <option value="Viernes">Viernes</option>
                                <option value="Sabado">Sabado</option>
                                <option value="Domingo">Domingo</option>                           
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

function ddlselect(){
       var docentes = document.getElementById("docentes").value;
  
       $(document).ready(function(){
   
        $.ajax({
            url:'DocenteArea',
            method:'POST',
            data:{
                _token:$('input[name=_token]').val(),
                docentes:docentes
            
            }
            // data:$('#form1').serialize()
        }).done(function(res){
            var arreglo = JSON.parse(res);
            for(var x= 0;x<arreglo.length;x++){
                var todo = '<option' + " " + 'value="'+ arreglo[x].id + '"' + '>'+ arreglo[x].nombre_area +'</option>';
                document.getElementById("Area").innerHTML = todo;
               $('ContenidoArea').append(todo);
           
            }
            
       

});

});

}
</script>
@endsection
