@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-4"><h2>Grafica Asistieron hoy</h2>
        <canvas id="asistenciaTodos" width="400" height="400"></canvas>
    </div>

</div>
<form method="POST" action="usuarios" id="form1">
    @csrf
    <input type="hidden" name="id" value="1">
</form>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="crossorigin="anonymous"></script>
<script>
      var curso =[];
    var cantidadEstudiantes=[];
 
    $(document).ready(function(){
        $.ajax({
            url:'AsistenciaTodos',
            method:'POST',
            data:$('#form1').serialize()
        }) .done(function(res){
          
             var arreglo = JSON.parse(res);
      alert(res);
            
            
            for(var x= 0;x<arreglo.length;x++){
                curso.push(arreglo[x].asistencia);
                cantidadEstudiantes.push(arreglo[x].total);
           
            }
            

    
var asistenciaTodos = document.getElementById('asistenciaTodos').getContext('2d');

var myChart = new Chart(asistenciaTodos, {
    type: 'bar',
    data: {
        labels: curso,
        datasets: [{
            label: '# de estudiantes',
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
            borderWidth: 0.4
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
    
});
        });

    });
    </script>
@endsection

