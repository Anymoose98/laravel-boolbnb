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
                <h4>Servizi:    </h4>
                    @forelse($apartments->services as $service)
                    <i class="{{ $service->icon}}"> </i> {{ $service->name }} <br>
                    @empty
                        L'appartamento non ha servizi aggiuntivi
                    @endforelse
            </div>
            <h4>Metri quadrati: </h4>{{ $apartments->square_meters}}mq
            <h4>Zona</h4>{{ $apartments->location }} <br>
            @if($apartments->services->isEmpty())
            <h4 class="mt-2">Servizi:    </h4>
            @else
            Non ci sono servizi extra
            @endif

            @if (!$message->isEmpty())
            <table class="table mt-3 table-striped text-center">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Soggetto</th>
                        <th>Messaggio</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($message as $message)
                    <tr>
                        <td>{{ $message->name}}</td>
                        <td>{{ $message->email}}</td>
                        <td>{{ $message->subject}}</td>
                        <td>{{ $message->message}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
                <p>Nessun messaggio disponibile.</p>
            @endif
        </div>
    </div>
</div>
@endsection
