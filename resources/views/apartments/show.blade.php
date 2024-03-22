@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 mt-3">
            <h4>Descrizione: </h4>{{ $apartment->description }}
            <h4>Stanze: </h4>{{ $apartment->rooms }}
            <h4>Letti: </h4>{{ $apartment->beds }}
            <h4>Bagni: </h4>{{ $apartment->bathrooms }}
            <h4>Metri quadri: </h4>{{ $apartment->square_meters }}<hr>
            <h4>Ubicazione: </h4>{{ $apartment->location }}
            <h4>Visibilità: </h4>{{ $apartment->visibility ? 'Visibile' : 'Non visibile' }}<hr>
            <h4>Coordinate:</h4>Latitudine {{ $apartment->latitudine }}, Longitudine {{ $apartment->longitudine }}
            <div class="mt-3">
                <h4 class="my-3">Immagine rappresentativa dell'appartamento:</h4>
                <img src="{{ asset('storage/' . $apartment->image) }}" alt="Immagine appartamento">
            </div>
        </div>
    </div>
</div>

@endsection
