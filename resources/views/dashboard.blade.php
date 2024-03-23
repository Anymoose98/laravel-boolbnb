@extends('layouts.non-admin')

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




@endsection
