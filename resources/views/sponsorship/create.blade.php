@extends('layouts.app')

@section('content')

{{-- Braintree Paypal --}}
<script src="https://js.braintreegateway.com/web/dropin/1.42.0/js/dropin.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" crossorigin="anonymous"></script>

{{-- Braintree Paypal [CODICE PER FAR FUNZIONARE IL PAGAMENTO]--}}
<script>
    var selectedType = '';

    function showPayment(type) {
        selectedType = type; 

        var form = document.querySelector('#paymentForm');
        var clientToken = "sandbox_rzxrr2v8_c2xs5pp8w7p7nkrs"; 

        braintree.dropin.create({
            authorization: clientToken,
            container: '#dropin-container',
            card: {
                validate: false
            }
        }, function (createErr, instance) {
            if (createErr) {
                console.error(createErr);
                return;
            }

            var buyButton = document.createElement('button');
            buyButton.innerHTML = 'Conferma';
            buyButton.addEventListener('click', function(event) {
                event.preventDefault(); 

                instance.requestPaymentMethod(function (err, payload) {
                    if (err) {
                        console.error('Error', err);
                        return;
                    }

                    payload.type = selectedType; 

                    fetch(form.getAttribute('action'), {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify(payload)
                    })
                    .then(function (response) {
                        setTimeout(function() {
                            window.location.href = "http://127.0.0.1:8000/apartments";
                        }, 1000);

                        return response.json();
                    })
                    .then(function (data) {
                        console.log(data);
                        
                    })
                    .catch(function (error) {
                        console.error('Error:', error);
                    });
                });
            });

            document.getElementById('dropin-container').appendChild(buyButton);

            openModal();
        });
    }

    /* FINESTRA MODALE PAGAMENTO */
    function openModal() {
        document.getElementById('myModal').style.display = 'block';
    }

    /* CHIUSURA MODALE PAGAMENTO */
    function closeModal() {
        document.getElementById('myModal').style.display = 'none';
    }
</script>

<div class="container">
    <div class="form-group mt-5">
        <div class="row">
            <form id="paymentForm" method="POST" action="{{ route('sponsorship.store', ['apartment_id' => $apartment->id]) }}" class="margine-superiore" >
                @csrf

                {{-- INPUT SCELTA SPONSOR COLLEGATA ALLA MODALE --}}
                <input type="hidden" name="type" id="sponsorshipType">

                <div class="row">

                    {{-- PACCHETTO BASE --}}
                    <div class="col-12 col-lg-4 mb-3">
                        <div class="adv-card">
                            <span class="title-adv">Base</span>
                            <div class="price">
                                <h2>2,99€</h2>
                                <span>/24 ore</span>
                            </div>

                            {{-- BOTTONE PER IL PAGAMENTO --}}
                            <button type="button" name="base" onclick="showPayment('base')">Acquista</button>
                        </div>
                    </div>

                    {{-- PACCHETTO STANDARD --}}
                    <div class="col-12 col-lg-4 mb-3">
                        <div class="adv-card">
                            <span class="title-adv">Standard</span>
                            <div class="price">
                                <h2>5,99€</h2>
                                <span>/72 ore</span>
                            </div>

                            {{-- BOTTONE PER IL PAGAMENTO --}}
                            <button type="button" name="standard" onclick="showPayment('standard')">Acquista</button>
                        </div>
                    </div>

                    {{-- PACCHETTO AVANZATO --}}
                    <div class="col-12 col-lg-4">
                        <div class="adv-card">
                            <span class="title-adv">Avanzato</span>
                            <div class="price">
                                <h2>9,99€</h2>
                                <span>/144 ore</span>
                            </div>

                            {{-- BOTTONE PER IL PAGAMENTO --}}
                            
                                <button type="button" name="avanzato" onclick="showPayment('avanzato')">Acquista</button>
                        </div>
                    </div>
                    
                </div>
            </form>
        </div>
    </div>
</div>

<style lang="scss">
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0,0,0,0.4);
    }

    .modal-content {
        background-color: #fefefe;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 25%;

        button{
            width: 100%;
            background-color: black;
            color: white;
            border-radius: 10px;
            border: none;
            padding: 10px 0;
        }
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

            /* 
*******************************
Phone 576px
******************************* 
*/
@media screen and (max-width: 576px){
    .modal-content {
        background-color: #fefefe;
        margin: 100% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 100%;

        button{
            width: 100%;
            background-color: black;
            color: white;
            border-radius: 10px;
            border: none;
            padding: 10px 0;
        }
    }
}
/* 
*******************************
Tablet 768px
******************************* 
*/
@media screen and (min-width:577px ) and (max-width:991px){
    .modal-content {
        background-color: #fefefe;
        margin: 100% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 100%;

        button{
            width: 100%;
            background-color: black;
            color: white;
            border-radius: 10px;
            border: none;
            padding: 10px 0;
        }
    }
}

/* 
*******************************
PC 992px
******************************* 
*/
@media screen and (min-width:992px){


}
</style>

{{-- MODALE PAGAMENTO --}}
<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <div class="container">
            {{-- DIV DEL PAGAMENTO DI BRAINTREE PAYPAL --}}

            <div id="dropin-container"></div>
        </div>
    </div>
</div>
@endsection
