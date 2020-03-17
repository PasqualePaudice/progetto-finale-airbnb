@extends('layouts.app')

@section('content')

    <div class="container">

        <form class="form-check" action="{{route('admin.payment.price',['apartment'=>$apartment])}}" method="post">
            @csrf
            <div class="card  d-inline-block mr-5">
                <div class="card-body">
                    <h5 class="card-title">Piano 1</h5>
                    <p class="card-text">24 ore di sponsorizzazione</p>
                    <h6>$2,99</h6>
                    <div class="form-check">

                        <input  id="Piano_1" type="radio" name="Piano" value="2.99" class="form-check-input">
                        <label class="form-check-label" for="Piano_1">Piano 1</label>

                    </div>
                </div>

            </div>
            <div class="card  d-inline-block mr-5">
                <div class="card-body">
                    <h5 class="card-title">Piano 2</h5>
                    <p class="card-text">72 ore di sponsorizzazione</p>
                    <h6>$5,99</h6>
                    <div class="form-check">

                        <input  id="Piano_2"   type="radio" name="Piano" value="5.99" class="form-check-input">
                        <label class="form-check-label" for="Piano_2">Piano 2</label>

                    </div>

                </div>

            </div>
                <div class="card d-inline-block ">
                    <div class="card-body">
                        <h5 class="card-title">Piano 3</h5>
                        <p class="card-text">144 ore di sponsorizzazione</p>
                        <h6>$9,99</h6>

                            <div class="form-check">
                                <input    id="Piano_3" type="radio" name="Piano" value="9.99" class="form-check-input">
                                <label class="form-check-label" for="Piano_3">Piano 3</label>

                            </div>

                    </div>

                </div>
                <button class="btn btn-primary" type="submit" name="button">Procedi al pagamento</button>
</form>






    

    </div>
@endsection
