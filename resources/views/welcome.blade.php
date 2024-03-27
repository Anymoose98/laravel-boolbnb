@extends('layouts.app')

@section('content')

<div class="image-carousel-container">
    <img src="{{ asset('img/carousel-1.jpg') }}" alt="ciao">

    <div class="search-bar">
        <div class="search-elem">
            <label for="city-input">Dove</label>
            <input type="text" name="city-input" id="city-input" placeholder="Cerca la destinazione">
        </div>

        <div class="search-elem">
            <label for="guest-input">Quante persone</label>
            <input type="text" name="guest-input" id="guest-input" placeholder="Inserisci il numero di ospiti">
        </div>

        <div class="search-elem">
            <label for="city-input">Demo</label>
            <input type="text" placeholder="Cerca la destinazione">
        </div>

        <div class="search-btn">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#fff" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
            </svg>
        </div>
    </div>
</div>

<div class="cards-container">
    <div class="row justify-content-start align-items-start">
        @foreach($apartments as $apartment)
            <div class="col-12 col-lg-6 col-xxl-3">
                <div class="personal-content">
                    <div class="image-card-container">
                        <img src="{{ asset("/storage/" . $apartment->image) }}" alt="{{ $apartment->name}}">
                    </div>
                    <div class="apartment-details">
                        <h2 class="fw-bolder">{{ $apartment->location }}</h2>
                        <p>{{ $apartment->description }}</p>
                    </div>
                </div>
            </div> 
        @endforeach
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelector('.search-btn').addEventListener('click', function () {
            const city = document.getElementById('city-input').value;
            const guests = document.getElementById('guest-input').value; // Corretto l'ID qui
            
            // Esegui la richiesta Axios
            axios.get('/api/search', {
                params: {
                    city: city,
                    guests: guests
                }
            })
            .then(function (response) {
                // Aggiorna i risultati sulla pagina
                updateResults(response.data);
            })
            .catch(function (error) {
                console.error('Si è verificato un errore durante la richiesta', error);
            });
        });

        function updateResults(results) {
            // Aggiorna la visualizzazione dei risultati
            const cardsContainer = document.querySelector('.cards-container .row');
            cardsContainer.innerHTML = ''; // Svuota il contenitore delle carte

            results.forEach(function (apartment) {
                const cardHTML = `
                    <div class="col-12 col-lg-6 col-xxl-3">
                        <div class="personal-content">
                            <div class="image-card-container">
                                 <img src="/storage/${apartment.image}" alt="${apartment.name}">
                            </div>
                            <div class="apartment-details">
                                <h2 class="fw-bolder">${apartment.location}</h2>
                                <p>${apartment.description}</p>
                            </div>
                        </div>
                    </div>`;
                cardsContainer.innerHTML += cardHTML;
            });
        }
    });
</script>

@endsection
