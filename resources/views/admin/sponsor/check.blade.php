@extends('layouts.publicAdmin')

@section('content')

        <div class="container mt-5">
            <div class="row d-flex justify-content-center m-0">
                <div class="col-md-6">
                    <div id="dropin-container"></div>
                    <div id="pagamento" class="alert alert-success d-none mt-2">Pagamento avvenuto con successo!</div>
                    <div id="pagamentoError" class="alert alert-danger d-none mt-2">Pagamento rifiutato, riprovare!</div>
                    <div class="d-flex justify-content-between">
                      <button class="btn btn-primary mt-5" id="submit-button">Paga Ora</button>
                      <a class="btn btn-info mt-5" href="{{route('admin.apartments.index')}}">Torna agli appartamenti</a>
                    </div>

                </div>
            </div>


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
                                    document.getElementById('pagamento').classList.remove('d-none');
                                    window.setTimeout(function () {
                                      window.location.replace('{{ route('admin.apartments.index') }}');
                                    }, 1000);

                                 } else {
                                     document.getElementById('pagamentoError').classList.remove('d-none');
                                     window.setTimeout(function () {
                                       window.location.replace('{{ route('admin.apartments.index') }}');
                                     }, 1000);
                                 }
                             }, 'json');

                         });

                     });

             });

         </script>

@endsection
