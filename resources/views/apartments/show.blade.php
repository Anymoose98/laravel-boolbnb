@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 mt-3">
            <h4>Descrizione: </h4>{{ $apartments->description}}
            <h4>Numero stanza: </h4>{{ $apartments->rooms}}
            <hr>
            <h4 class="my-3">Immagine dell'appartamento:</h4>
            <div class="img-show">
                <img src="{{ asset("/storage/" . $apartments->image) }}" alt="{{ $apartments->name}}" class="img-show">
                <h4> Letti disponibili: </h4>{{ $apartments->beds}}
                <hr>
                <h4>Bagni utilizzabili:</h4>{{ $apartments->bathrooms}}
                <hr>

            </div>
            <h4>Metri quadrati: </h4>{{ $apartments->square_meters}}mq
            <h4>Zona</h4>{{ $apartments->location }}

        </div>
    </div>
</div>
@endsection