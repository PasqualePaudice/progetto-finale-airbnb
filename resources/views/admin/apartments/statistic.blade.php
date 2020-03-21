@extends('layouts.app')

@section('content')



<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <h1>Statistiche Appartmento {{$apartment->id}}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <canvas id="myChart" width="400" height="400"></canvas>
        </div>

    </div>
</div>

<script>

var url = "{{ route('admin.apartments.chart', ['apartment' => $apartment])}}";
var Days = new Array();
var Labels = new Array();
var Views = new Array();
$(document).ready(function(){
    $.get(url, function(response){
        console.log(response);
        response.forEach(function(data){
            Days.push(data.created_at);
        });
    });
    console.log(Days);
})






















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
