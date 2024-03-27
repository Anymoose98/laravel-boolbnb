@extends('layouts.app')

@section('content')

        <div class="image-carousel-container">
            <img src="{{ asset('img/carousel-1.jpg') }}" alt="ciao">
    
            <div class="search-bar">
                <div class="search-elem">
                    <label for="city-input">Dove</label>
                    <input type="text" placeholder="Cerca la destinazione">
                </div>

                <div class="search-elem">
                    <label for="city-input">Quante persone</label>
                    <input type="text" placeholder="Cerca la destinazione">
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
    
@endsection