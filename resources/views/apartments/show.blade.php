@extends("layouts.app")

@section("content")
{{-- 
<div class="container">
    <div class="row">
        <div class="col-12 mt-3">
            <h4>Descrizione: </h4>{{ $apartments->marca}}
            <h4>Modello: </h4>{{ $apartments->modello}}<hr>
            <h4  class="my-3">Immagine rappresentativa dell'auto:</h4>
            <div class="img-auto">
                    <img src="{{ asset("/storage/" . $apartments->cover_image) }}" alt="{{ $apartments->name}}" >
                <h4>Alimentazione: </h4>{{ $apartments->alimentazione}}<hr>
                <h4>Optional</h4>
                @forelse($apartments->optionals as $optional)
                    -{{ $optional->name }}
                    @empty
                        Nessun optional selezionato per quest'auto
                    @endforelse
            </div>
            <h4>Prezzo: </h4>{{ $apartments->prezzo}}€
            <h4>Numero porte: </h4>{{ $apartments->num_porte}}
            <h4>Km. : </h4>{{ $apartments->chilometri}}
            <h4>Colore: </h4>{{ $apartments->colore}}<hr>
            <h4>Anno:</h4>{{ $apartments->anno}}<hr>
        </div>
                  
    </div>
</div> --}}


@endsection