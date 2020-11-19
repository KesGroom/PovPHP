@extends('layouts.app')
@section('content')
<h1>Grafica para pqrs sin responder</h1>
    <div class="row col-6">
        <canvas id="myChart" width="350" height="350"></canvas>
    </div>
<form method="POST" action="pqrs" id="form1">
    @csrf
    <input type="hidden" name="id" value="1">
</form>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
<script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>
<script>
    var categoria =[];
    var cantidad=[];

    $(document).ready(function(){
        $.ajax({
            url:'pqrs',
            method:'POST',
            data:$('#form1').serialize()
        }).done(function(res){
          
            var arreglo = JSON.parse(res);
            
            for(var x= 0;x<arreglo.length;x++){
                categoria.push(arreglo[x].categoria);
                cantidad.push(arreglo[x].total);
           
            }

            var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: categoria,
        datasets: [{
            label: 'Cantidad sin responder',
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
