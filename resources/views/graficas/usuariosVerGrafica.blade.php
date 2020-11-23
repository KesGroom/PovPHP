@extends('layouts.app')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
<div class="row">
    <div class="col-5"><h2>Grafica Usuarios por Rol</h2>
        <canvas id="usuarioPorRol" width="300" height="300"></canvas>
    </div>
    <div class="col-5"><h2>Grafica Usuarios por Genero</h2>
        <canvas id="usuarioPorgenero" width="300" height="300"></canvas>
    </div>

</div>
<div class="row">
    <div class="col-5"><h2>Grafica Estudiantes por Servicio Social</h2>
        <canvas id="usuarioEstudianteServiciosocial" width="300" height="300"></canvas>
    </div>

</div>
<form method="POST" action="usuarios" id="form1">
    @csrf
    <input type="hidden" name="id" value="1">
</form>
<form method="POST" action="usuarios" id="form2">
    @csrf
    <input type="hidden" name="id" value="2">
</form>


<script src="https://code.jquery.com/jquery-3.5.1.js"integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="crossorigin="anonymous"></script>
{{-- script para estudiante --}}
<script>
  var ServicioSocial =[];
    var cantidadEstudiantes=[];
 
    $(document).ready(function(){
        $.ajax({
            url:'graficarEstudiantesServicioSocial',
            method:'POST',
            data:$('#form2').serialize()
        }).done(function(usuarioEstudiante){
    
          
             var arreglo = JSON.parse(usuarioEstudiante);
            for(var x= 0;x<arreglo.length;x++){
                ServicioSocial.push(arreglo[x].estado_servicio_social);
                cantidadEstudiantes.push(arreglo[x].total);
           
            }
          

    
var usuarioEstudianteServiciosocial = document.getElementById('usuarioEstudianteServiciosocial').getContext('2d');

var myChart = new Chart(usuarioEstudianteServiciosocial, {
    type: 'pie',
    data: {
        labels:  ServicioSocial,
        datasets: [{
            label: '# of Votes',
            data: cantidadEstudiantes,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        
        }
    
});
        });

    });

</script>
{{-- SCRIPT para genero usuarios --}}
<script>
      var Genero =[];
    var cantidadGenero=[];
 
    $(document).ready(function(){
        $.ajax({
            url:'graficarGenero',
            method:'POST',
            data:$('#form2').serialize()
        }) .done(function(usuarioGenero){
          
             var arregloGenero = JSON.parse(usuarioGenero);
            for(var x= 0;x<arregloGenero.length;x++){
                Genero.push(arregloGenero[x].genero);
                cantidadGenero.push(arregloGenero[x].total);
            }

    
var usuarioPorgenero = document.getElementById('usuarioPorgenero').getContext('2d');

var myChart = new Chart(usuarioPorgenero, {
    type: 'pie',
    data: {
        labels:  Genero,
        datasets: [{
            label: '# of Votes',
            data: cantidadGenero,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        
        }
    
});
        });

    });

</script>
<script>

    //Graficas para usuarios por año-- No salio uwu

    //  var mes =[];
    // var cantidadMes=[];
    // $(document).ready(function(){
    //     $.ajax({
    //         url:'usuariosMes',
    //         method:'POST',
    //         data:$('#form2').serialize()
    //     }) .done(function(usuarioMes){
    
    //     //   alert(usuarioMes);
    //          var arregloMes = JSON.parse(usuarioMes);
      

  
    //         for(var x= 0;x<arregloMes.length;x++){
    //             mes.push(arregloMes[x].month)
    //             cantidadMes.push(arregloMes[x].total);
    //         }
    //         alert(usuarioMes);
        

    //     });

    // });
  
</script>
{{-- 
Graficas para roles para estudiantes --}}
<script>
   var rol =[];
   var nombreRol = ["Coordinador","Docente","Estudiante","Acudiente"];
    var cantidad=[];
 
    $(document).ready(function(){
        $.ajax({
            url:'usuariosRol',
            method:'POST',
            data:$('#form1').serialize()
        }) .done(function(res){
          
             var arreglo = JSON.parse(res);
            
            
            for(var x= 0;x<arreglo.length;x++){
                rol.push(arreglo[x].rol);
                cantidad.push(arreglo[x].total);
           
            }
        

    
var usuarioPorRol = document.getElementById('usuarioPorRol').getContext('2d');

var myChart = new Chart(usuarioPorRol, {
    type: 'pie',
    data: {
        labels: nombreRol,
        datasets: [{
            label: '# of Votes',
            data: cantidad,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        
        }
    
});
        });

    });

</script>
@endsection