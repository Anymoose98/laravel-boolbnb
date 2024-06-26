@extends('layouts.app')

@section('content')
    <div class="image-carousel-container">
        <img src="{{ asset('img/carousel-1.jpg') }}" alt="ciao">


    </div>

    <div class="searchbar-size">

        <div class="search-bar">
            <div class="search-elem">
                <label for="city-input">Dove</label>
                <input type="text" name="city-input" id="city-input" placeholder="Cerca la destinazione">
            </div>

            <div class="search-elem">
                <label for="beds-input">Quanti letti</label>
                <input type="text" name="beds-input" id="beds-input" placeholder="Inserisci il numero di letti">
            </div>

            <div class="search-elem me-5">
                <label for="filter-input">Filtri</label>
                <i name="filter-input" id="filter-input" class="fa-solid fa-sliders"></i>

                <div class="filter-section" id="filterSection">
                    <div class="number-room d-flex">
                        <span id="label-rooms">Numero stanze</span>
       <input type="number" name="rooms-number" min="0" id="rooms-input" class="rooms-number-input">
                    </div>
                    <div class="number-room d-flex">
                        <span id="label-rooms">Numero stanze</span>
                        <input type="number" name="rooms-number" min="0" id="rooms-input" class="rooms-number-input">

                        <input type="number" name="rooms-number" default="0" min="0" id="rooms-input" class="rooms-number-input">
                    </div>

                    
                    
                </div>
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
                <div class="col-12 col-lg-6 col-xxl-3" data-image="{{ $apartment->image }}"
                    data-name="{{ $apartment->name }}" data-location="{{ $apartment->location }}"
                    data-description="{{ $apartment->description }}" data-id="{{ $apartment->id }}">
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
                            <p id="description gradient-text">
                                {{ Illuminate\Support\Str::limit($apartment->description, 30) }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

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

            /* INPUT DEI FILTRI */
            let city = document.getElementById('city-input').value;
            let beds = document.getElementById('beds-input').value;
            let rooms = document.getElementById('rooms-input').value;

            let ariaCondizionata = document.getElementById('ariaCondizionata').checked;


            /* SE NON SI UTILIZZA IL FILTRO DEI LETTI ALLORA IL MINIMO SARA' 0 */
            if (beds == "") {
                beds = 0;
            }

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
                searchApartments(latitude, longitude, beds, rooms);
            })
        }

        /* FUNZIONE CHE RICERCA GLI APPARTAMENTI */
        function searchApartments(latitude, longitude, beds, rooms) {
            /* INPUT DEL RAGGIO DI RICERCA */
            const radius = document.getElementById('radius-input').value;

            /* CHIAMATA API CON PARAMETRI LATITUDINE, LONGITUDINE E RAGGIO DI DISTANZA PER LA RICERCA */
            axios.get('http://127.0.0.1:8000/api/apartments/', {
                    params: {
                        latitude: latitude,
                        longitude: longitude,
                        beds: beds,
                        rooms: rooms,
                        radius: radius,
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

                    /* PER OGNI APPARTAMENTO VIENE CREATA UNA STRINGA HTML PER LA CARD */
                    apartments.forEach(apartment => {
                        const card = `
    <div class="col-12 col-lg-6 col-xxl-3" data-image="${apartment.image}"
         data-name="${apartment.name}" data-location="${apartment.location}"
         data-description="${apartment.description}">
        <div class="personal-content">
            <div class="image-card-container">
                ${apartment.image == 0 ?
                    `<img src="{{ asset('/storage/placeholder.png') }}" alt="">` :
                    `<img src="<?php echo asset('/storage/${apartment.image}'); ?>" alt="${apartment.name}">`
                }
            </div>
            <div class="apartment-details">
                <h2 class="fw-bolder">${apartment.location}</h2>
                <p id="description" class="gradient-text">
                    ${apartment.description.slice(0, 25) + '...'}
                </p>
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

            /* OPACITA' DELLE SEZIONI PER I FILTRI (I TIMER SERVONO PER FAR FUNZIONARE LA TRANSIZIONE DELLA SFUMATURA) */
            if (!event.target.matches(
                    '#city-input, #radius-input, #rangeSection, #title-distance, #slider-value')) {

                setTimeout(function() {
                    distanceFilterSection.style.opacity = '0';
                }, 10);

                setTimeout(function() {
                    distanceFilterSection.style.display = 'none';
                }, 310);
            } else {

                distanceFilterSection.style.display = 'flex';
                setTimeout(function() {
                    distanceFilterSection.style.opacity = '100';
                }, 10);

                
                setTimeout(function() {
                    distanceFilterSection.style.display = 'none';
                }, 310); 
            } else {
                
                distanceFilterSection.style.display = 'flex';
                setTimeout(function() {
                    distanceFilterSection.style.opacity = '100';
                }, 10); 
            }

        });



        /* CAMBIO OPACITA' DELLA SEZIONE DEL RANGE */
        document.addEventListener('click', function(event) {

            /* PRENDO LA SEZIONE DEL FILTRO */
            const filterSection = document.querySelector('.filter-section');

            /* SE L'ELEMENTO CLICCATO NON E' UNO DI QUELLI ELENCATI ALLORA OPACITA' 0 */
            if (!event.target.matches('#filter-input, #rooms-input, #label-rooms')) {
                filterSection.style.opacity = '0';
            } else {
                filterSection.style.opacity = '100';
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

                    /* RISTAMPA TUTTE LE CARD SE LA RICERCA E' VUOTA */
                    apartments.forEach(apartment => {
                        const card = `
    <div class="col-12 col-lg-6 col-xxl-3" data-image="${apartment.image}"
         data-name="${apartment.name}" data-location="${apartment.location}"
         data-description="${apartment.description}">
        <div class="personal-content">
            <div class="image-card-container">
                ${apartment.image == 0 ?
                    `<img src="{{ asset('/storage/placeholder.png') }}" alt="">` :
                    `<img src="<?php echo asset('/storage/${apartment.image}'); ?>" alt="${apartment.name}">`
                }
            </div>
            <div class="apartment-details">
                <h2 class="fw-bolder">${apartment.location}</h2>
                <p id="description" class="gradient-text">
                    ${apartment.description.slice(0, 25) + '...'}
                </p>
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
