@extends('layouts.publicAdmin')

@section('content')



<div class="container mt-5">
    <div class="row justify-content-between">
            <div class="col-sm-8">
                <h1>Statistiche per l'appartamento {{$apartment->id}}</h1>
            </div>
            <div class="col-sm-4 text-right">
                <a class="btn btn-success mt-2" href="{{route('admin.apartments.show',['apartment' => $apartment->id])}}">Torna alla pagina dettagli</a>
            </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <canvas id="canvas" height="280" width="600"></canvas>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-sm-12 text-center">
            <h2>Numero totale di visualizzazioni per il mese corrente: <span id="num_vis"></span></h2>
        </div>
    </div>
</div>

<script>

var url = "{{ route('admin.apartments.chart', ['apartment' => $apartment])}}";
var Days = new Array();
var Views = new Array();
$(document).ready(function(){

    $.get(url, function(response){
        for (var variable in response) {
            // questo cicla i count (numero delle views)
            Views.push(response[variable]);
            // queste sono le date
            Days.push(variable);
        }
        var Sum = 0;
        for (var i = 0; i < Views.length; i++) {
            Sum += parseInt(Views[i]);
        }
        document.getElementById("num_vis").innerHTML = Sum;
        var ctx = document.getElementById("canvas").getContext('2d');
        var myChart = new Chart(ctx, {
                  type: 'line',
                  data: {
                      labels: Days,
                      datasets: [{
                          label: 'Numero Visualizzazioni',
                          data: Views,
                          backgroundColor: [
                            'rgba(255, 99, 132, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)'
                        ],
                          borderWidth: 1
                      }]
                  },
                  options: {
                      scales: {
                          yAxes: [{
                              ticks: {
                                  beginAtZero:true
                              }
                          }]
                      }
                  }
              });
    });
    console.log(Days);
    console.log(Views);

});






















//
//
// var ctx = document.getElementById('myChart').getContext('2d');
// var myChart = new Chart(ctx, {
//     type: 'bar',
//     data: {
//         labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
//         datasets: [{
//             label: 'numero visualizzazioni',
//             data: [12, 19, 3, 5, 2, 3],
//             backgroundColor: [
//                 'rgba(255, 99, 132, 0.2)',
//                 'rgba(54, 162, 235, 0.2)',
//                 'rgba(255, 206, 86, 0.2)',
//                 'rgba(75, 192, 192, 0.2)',
//                 'rgba(153, 102, 255, 0.2)',
//                 'rgba(255, 159, 64, 0.2)'
//             ],
//             borderColor: [
//                 'rgba(255, 99, 132, 1)',
//                 'rgba(54, 162, 235, 1)',
//                 'rgba(255, 206, 86, 1)',
//                 'rgba(75, 192, 192, 1)',
//                 'rgba(153, 102, 255, 1)',
//                 'rgba(255, 159, 64, 1)'
//             ],
//             borderWidth: 1
//         }]
//     },
//     options: {
//         scales: {
//             yAxes: [{
//                 ticks: {
//                     beginAtZero: true
//                 }
//             }]
//         }
//     }
// });
</script>


@endsection
