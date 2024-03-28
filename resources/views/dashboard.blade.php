@extends('layouts.non-admin')

@section('content')
    <div class="image-carousel-container">
        <img src="{{ asset('img/carousel-1.jpg') }}" alt="ciao">

        <div class="search-bar">
            <div class="search-elem">
                <label for="city-input">Dove</label>
                <input type="text" name="city-input" id="city-input" placeholder="Cerca la destinazione">
            </div>

            <div class="search-elem">
                <label for="guest-input">Quanti letti</label>
                <input type="text" name="guest-input" id="guest-input" placeholder="Inserisci il numero di letti">
            </div>

            <div class="search-elem">
                <label for="city-input">Demo</label>
                <input type="text" placeholder="Cerca la destinazione">
            </div>

            <div class="search-btn" role="button" id="searchBtn">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#fff" class="bi bi-search"
                    viewBox="0 0 16 16">
                    <path
                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                </svg>
            </div>

            <div class="distance-filter-section" id="rangeSection">
                <span id="title-distance">Raggio di distanza</span>
                <input type="range" min="20" max="100" value="20" class="slider" id="radius-input">
                <span id="slider-value"></span>
            </div>
        </div>


    </div>

    <div class="cards-container">
        <div class="row justify-content-start align-items-start">
            @foreach ($apartments as $apartment)
                <div class="col-12 col-lg-6 col-xxl-3">
                    <div class="personal-content">
                        <div class="image-card-container">
                            @if ($apartment->image == 0)
                                <img src="{{ asset('/storage/placeholder.png') }}" alt="">
                            @else
                                <img src="{{ asset('/storage/' . $apartment->image) }}" alt="{{ $apartment->name }}">
                            @endif
                        </div>
                        <div class="apartment-details">
                            <h2 class="fw-bolder">{{ $apartment->location }}</h2>
                            {{-- $apartment->description.substring(0, 10) --}}
                            <p id="description gradient-text">{{ Illuminate\Support\Str::limit($apartment->description, 30) }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <a href="{{ route("apartments.index") }}">
        <button class="seller-button">
            <svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <rect width="35" height="35" fill="url(#pattern0)"/>
                <defs>
                <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                <use xlink:href="#image0_237_374" transform="scale(0.0104167)"/>
                </pattern>
                <image id="image0_237_374" width="96" height="96" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGAAAABgCAYAAADimHc4AAAACXBIWXMAAAsTAAALEwEAmpwYAAAC10lEQVR4nO3du2sUYRTG4S8ogpcELFRUtLCyEUErbdLZWdraaWNhaSuKN6wsLPRPsA0WFhZWgkaLNDbeCwsLQQhIyJKfDBkQF8JmdvbMOWfmfdrJfpfzBmb3MB9TioiIiIiISHDAYeAZsAQc917PYABzwFXgN/+sAjeAHd7r6zXgFPCarb0Dznqvs3eA3cBNYI3J1oFHwF7vdfcCsAh8oLlPwAXv9acF7AeeABu0U92oD3jvJxXgEvCT2flV37jnvPcWGnACeIGdV8BJ732GA+wErtdfJ639qW/ou7z3HQJwBlimeyvAuTJU1ddE4D4wws9GfaNfKEMCXAS+E8cP4HIZUP8mqqVe9pW26N9EtdqrvtI2+jdR5e4rNezfRJWzr9SifxNVjr7SDPs3UcXtKxn0b6KK1VfqoH8TlW9fqeP+TVQ+fSXH/k1U3fSVgvRvorLtKwXs30Rl01fy3lU2CsCZAnCmAJwpAGcKwJkCcKYA+haAiIjIVqxvUiQf31z2AmE8vrnsBcJ4fHPZC4Tx+OayFwjj8c1lLxDG45vLXiCMxzeXvUAYj2/OuUBrwHPgCnAeOFKGximAdeAxcLAMnUMAX4DTNrtJqOMA3ui/3i+Ar8Chpp/vvY4CGFXPpdrsILmOAnhqs/oe6CCAEXDUZvU90EEAL7fxNwvAw/oh4sjHpKq1fQMeAPNTF31s841MMf61Cdf3Ae/JZ3kmpzCbzjrF+IsTrt8lr9util8XoJEpxj824fpn8vrYqvh1ARppPeGY5Kd2RqWtpjO2nnAMyZW2Op9wDMmVtjqfcAzJlbY6n1D+pwCcKQBnCkBERMSIwW+Pmf5uIDkF4EwBOFMAzhSAMwXgTAE4UwDOFIAzBeBMAThTAM5KdiRXsiO5kh3JlewY+qOJ3th8z8twH871Btwhr1slOzbfbVC9+yubt8Ce0gfAfH3spzrKGv2IUrXGe9XJnmrxfwHQQgSDLzGBTQAAAABJRU5ErkJggg=="/>
                </defs>
            </svg>
                
            <div class="ms-3">
                Diventa venditore
            </div>
        </button>
    </a>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.0.0/maps/maps-web.min.js"></script>


    <script>
        /* PRENDIAMO GLI ELEMENTI DELLO SLIDER */
        var slider = document.getElementById("radius-input");
        var output = document.getElementById("slider-value");


        /* AD OGNI MODIFICA DELLO SLIDER AGGIUNGIAMO AD OUTPUT */
        slider.addEventListener("input", function() {
            output.textContent = slider.value + 'Km';
        });

        output.textContent = slider.value + 'Km';
    </script>


    <script>

        /* FUNZIONE CHE RECUPERA LE COORDINATE DELLA CITTA' CERCATA */
        function searchApartmentsCoordinates() {

            /* INPUT DELLA CITTA' */
            const city = document.getElementById('city-input').value;

            /* CHIAMATA AXIOS PER RECUPERARE LE COORDINATE DELLA CITTA' INSERITA */
            axios.get('https://api.tomtom.com/search/2/geocode/' + city + '.json', {
                params: {
                    key: 'ARRIZGGoUek6AqDTwVcXta7pCZ07Q490'
                }
            }).then(function(response) {

                const results = response.data.results;

                /* PRENDE I PRIMI RISULTATI OTTENUTI */
                const latitude = results[0].position.lat;
                const longitude = results[0].position.lon;

                /* PASSA I PARAMETRI LATITUDINE E LONGITUDINE ALLA FUNZIONE */
                searchApartments(latitude, longitude);
            })
        }

        /* FUNZIONE CHE RICERCA GLI APPARTAMENTI */
        function searchApartments(latitude, longitude) {

            /* INPUT DEL RAGGIO DI RICERCA */
            const radius = document.getElementById('radius-input').value;

            /* CHIAMATA API CON PARAMETRI LATITUDINE, LONGITUDINE E RAGGIO DI DISTANZA PER LA RICERCA */
            axios.get('http://127.0.0.1:8000/api/apartments/', {
                    params: {
                        latitude: latitude,
                        longitude: longitude,
                        radius: radius
                    }
                })
                .then(function(response) {
                    console.log(response.data);

                    const apartments = response.data.results;

                    /* RECUPERO IL CONTAINER DELLE CARDS */
                    const cardsContainer = document.querySelector('.cards-container');
                    cardsContainer.innerHTML = '';

                    /* CREO UNA ROW NEL MOMENTO DELLA RICERCA */
                    const row = document.createElement('div');
                    row.classList.add('row');

                    /* PER OGNI APPARTAMENTO VIENE CREATA UNA CARD CON I VALORI DELLA CHIAMATA */
                    apartments.forEach(apartment => {
                        const card = `
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
        </div>
    `;
                        row.insertAdjacentHTML('beforeend', card);
                    });

                    cardsContainer.appendChild(row);
                })
        }

        /* AVVIA LA FUNZIONE PREMENDO L'INVIO */
        document.getElementById('city-input').addEventListener('keyup', function(event) {
            if (event.keyCode === 13) {
                event.preventDefault();
                searchApartments();
            }
        });

        /* AVVIA LA FUNZIONE AL CLICK */
        document.getElementById('searchBtn').addEventListener('click', function(event) {
            searchApartmentsCoordinates();
        });

        /* CAMBIO OPACITA' DELLA SEZIONE DEL RANGE */
        document.addEventListener('click', function(event) {

            /* PRENDO LA SEZIONE DEL FILTRO */
            const distanceFilterSection = document.querySelector('.distance-filter-section');

            /* SE L'ELEMENTO CLICCATO NON E' UNO DI QUELLI ELENCATI ALLORA OPACITA' 0 */
            if (!event.target.matches('#city-input, #radius-input, #rangeSection, #title-distance, #slider-value')) {
                distanceFilterSection.style.opacity = '0';
            } else {
                distanceFilterSection.style.opacity = '100';
            }
        });

        /* VERIFICA SE ALL'INVIO L'INPUT CITTA' E' VUOTO */
        document.getElementById('city-input').addEventListener('keyup', function(event) {
            if (event.keyCode === 13) {
                event.preventDefault();

                /* SE E' VERO RISTAMPA TUTTI GLI APPARTAMENTI */
                const city = this.value.trim(); 
                if (city !== '') {
                    searchApartmentsCoordinates();
                } else {
                    showAllApartments();
                }
            }
        });


        /* VERIFICA SE AL CLICK L'INPUT CITTA' E' VUOTO */
        document.getElementById('searchBtn').addEventListener('click', function(event) {

                event.preventDefault();

                /* SE E' VERO RISTAMPA TUTTI GLI APPARTAMENTI */
                const city = document.getElementById('city-input').value;
                if (city !== '') {
                    searchApartmentsCoordinates();
                } else {
                    showAllApartments();
                }
        });


        /* FUNZIONE CHE RISTAMPA TUTTI GLI APPARTAMENTI SE L'INPUT CITY E' VUOTO */
        function showAllApartments() {

            /* CHIAMATA AXIOS CON TUTTI GLI APPARTAMENTI */
            axios.get('http://127.0.0.1:8000/api/apartments/')
                .then(function(response) {
                    const apartments = response.data.results;
                    const cardsContainer = document.querySelector('.cards-container');
                    cardsContainer.innerHTML = '';

                    const row = document.createElement('div');
                    row.classList.add('row');

                    apartments.forEach(apartment => {
                        const card = `
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
                    </div>
                `;
                        row.insertAdjacentHTML('beforeend', card);
                    });

                    cardsContainer.appendChild(row);
                })
        }
    </script>



@endsection
