@extends('layouts.app')

@section('content')
    <div class="image-carousel-container">
        <img src="{{ asset('img/carousel-1.jpg') }}" alt="ciao">

        <div class="search-bar">

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