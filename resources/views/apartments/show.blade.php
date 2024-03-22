@extends('layouts.app')

@section('content')

<<<<<<< HEAD
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
=======
@section("content")
 
<div class="container">
    <div class="row">
        <div class="col-12 mt-3">
            <h4>Descrizione: </h4>{{ $apartments->description}}
            <h4>Numero stanza: </h4>{{ $apartments->rooms}}<hr>
            <h4  class="my-3">Immagine dell'appartamento:</h4>
            <div class="img-auto">
                    <img src="{{ asset("/storage/" . $apartments->image) }}" alt="{{ $apartments->name}}" >
                <h4> Letti disponibili: </h4>{{ $apartments->beds}}<hr>
                <h4>Bagni utilizzabili:</h4>{{ $apartments->bathrooms}}<hr>
               
            </div>
            <h4>Metri quadrati: </h4>{{ $apartments->square_meters}}mq
            <h4>Zona</h4>{{ $apartments->location}}
           
>>>>>>> cb206e81c7949874dfa0a7c730cb500e9be8c31a
        </div>
    </div>
<<<<<<< HEAD
</div>
=======
</div> 
>>>>>>> cb206e81c7949874dfa0a7c730cb500e9be8c31a

@endsection
