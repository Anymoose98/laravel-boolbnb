@extends('layouts.authenticated')

@section('content')
    <div class="confirm-window">
        <div class="confirm-section">
            <lottie-player autoplay mode="normal"
                src="https://lottie.host/81ccb53c-f7e4-4435-a21f-acdd1b51fed0/v2hzASfjrS.json"
                class="icon-lottie"></lottie-player>
            <div id="lottie-animation"></div>
            <h1>Pagamento eseguito con successo!</h1>   
            <p class="text-center mt-4 fs-5">Il tuo pagamento è stato eseguito con successo, il tuo appartamento ora comparirà nella lista degli appartamenti in evidenza.</p>
            <a href="http://127.0.0.1:8000/apartments">Torna agli appartamenti</a>
        </div>
    </div>

    <style>
        .confirm-window {
            width: 100vw;
            height: 100vh;

            display: flex;
            justify-content: center;
            align-items: center;

            .confirm-section {
                width: 500px;
                padding: 50px;
                border-radius: 10px;
                -webkit-box-shadow: 0px 2px 14px 0px #0000001a;
                -moz-box-shadow: 0px 2px 14px 0px #0000001a;
                -o-box-shadow: 0px 2px 14px 0px #0000001a;
                box-shadow: 0px 2px 14px 0px #0000001a;
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;

                h1 {
                    font-weight: 800;
                    font-size: 25px;
                    text-align: center;
                    margin-top: 40px
                }

                .icon-lottie{
                    width: 150px;
                }

                a{
                    background-color: rgb(54, 240, 200);
                    color: white;
                    font-weight: 700;
                    padding: 20px 100px;
                    margin-top: 40px;
                    border-radius: 10px;
                }
            }
        }
    </style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.7.9/lottie.min.js"></script>
    <script>
        // Inizializza l'animazione Lottie
        const animationContainer = document.getElementById('lottie-animation');
        const animData = {
            container: animationContainer,
            renderer: 'svg',
            loop: false, // Imposta il loop su false per eseguire l'animazione solo una volta
            autoplay: true,
            path: 'https://lottie.host/embed/81ccb53c-f7e4-4435-a21f-acdd1b51fed0/v2hzASfjrS.json' // Sostituisci 'url-del-tuo-file-json-di-lottie.json' con il percorso del tuo file JSON di Lottie scaricato
        };
        const anim = lottie.loadAnimation(animData);
    </script>
@endsection
