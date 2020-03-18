@extends('layouts.app')

@section('content')

        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div id="dropin-container"></div>
                    <button class="btn btn-success" id="submit-button">Paga Ora</button>
                </div>
            </div>

            <a class="btn btn-success" href="{{route('admin.apartments.index')}}">Torna agli appartamenti</a>
        </div>




        <script>
             var button = document.querySelector('#submit-button');
             braintree.dropin.create({
                 authorization: "{{ Braintree_ClientToken::generate() }}",
                 container: '#dropin-container'
             }, function (createErr, instance) {
                     button.addEventListener('click', function () {
                         instance.requestPaymentMethod(function (err, payload) {
                             $.get('{{ route('admin.payment.make', [ 'prezzo' => $prezzo , 'apartment' => $apartment]) }}', {payload},function(response){
                                 if (response.success) {
                                     alert('Payment successfull!');

                                 } else {
                                     alert('Payment failed');
                                 }
                             }, 'json');

                         });
                         document.getElementById("submit-button").style.display = "none";
                     });


             });







         </script>

@endsection
