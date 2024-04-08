@extends('layouts.app')

@section('content')
    <div class="main-content-show">
        <div class="photo-container-show">
            <div class="photo-fixed">
                <img src="{{ asset('/storage/' . $apartments->image) }}" alt="{{ $apartments->name }}">
            </div>
        </div>


        <div class="info-window-show">
            <div class="info-container-show">
                <div class="info-section-show">
                    <span class="click-num">• {{ $apartments->clicks }} Click</span>
                    <h1 class="address-show">{{ $apartments->address }}</h1>
                    <p class="description-show">{{ $apartments->description }}</p>
                </div>

                <div class="info-section-show">
                    <h4 class="title-info-show">Dettagli</h4>
                    <ul class="list-unstyled mt-3">
                        <li>
                            <i class="fa-solid fa-maximize main-color"></i><span class="ms-2 fw-bold main-color">Dimensioni:
                                <span class="fw-light text-dark">{{ $apartments->square_meters }}</span></span>
                        </li>
                        <li>
                            <i class="fa-solid fa-door-open main-color"></i><span class="ms-2 fw-bold main-color">Numero
                                Stanze: <span class="fw-light text-dark">{{ $apartments->rooms }}</span></span>
                        </li>
                        <li>
                            <i class="fa-solid fa-bed main-color"></i></i><span class="ms-2 fw-bold main-color">Numero
                                Letti: <span class="fw-light text-dark">{{ $apartments->beds }}</span></span>
                        </li>
                        <li>
                            <i class="fa-solid fa-sink main-color"></i><span class="ms-2 fw-bold main-color">Numero Bagni:
                                <span class="fw-light text-dark">{{ $apartments->bathrooms }}</span></span>
                        </li>
                    </ul>
                </div>

                <div class="info-section-show">
                    <h4 class="title-info-show">Servizi</h4>
                    <div class="services-group-show">
                        @forelse($apartments->services as $service)
                            <div class="service-container-show">
                                <i class="{{ $service->icon }}"> </i> {{ $service->name }}
                            </div>
                        @empty
                            L'appartamento non ha servizi aggiuntivi
                        @endforelse
                    </div>
                </div>

                <div class="info-section-show">
                    <div class="messages-section p-4">
                        <h4 class="title-info-show"><i class="fa-solid fa-inbox me-2"></i>Inbox</h4>
                        <hr>
                        @foreach ($message as $index => $msg)
                            <div class="single-message-show">
                                <div class="accordion accordion-flush" id="accordionFlushExample{{ $index }}">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapseOne{{ $index }}"
                                                aria-expanded="false" aria-controls="flush-collapseOne{{ $index }}">
                                                {{ $msg->email }}
                                            </button>
                                        </h2>
                                        <div id="flush-collapseOne{{ $index }}" class="accordion-collapse collapse"
                                            data-bs-parent="#accordionFlushExample{{ $index }}">
                                            <div class="accordion-body">
                                                <h5 class="fw-bold">{{ $msg->subject }} <span class="fw-light fs-6">•
                                                        {{ $msg->name }}</span></h5>
                                                {{ $msg->message }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>

    </div>

    {{-- <div class="container">
    <div class="row">
        <div class="col-12 mt-3">
            <h4>Descrizione: </h4>
            <h4>Numero stanza: </h4>{{ $apartments->rooms}}
            <hr>
            <h4 class="my-3">Immagine dell'appartamento:</h4>
            <div class="img-show">
                
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
            <h4>Metri quadrati: </h4>mq
            <h4>Zona</h4>{{ $apartments->location }} <br>
            <p>Numero click: {{ $apartments->clicks }}</p> 
            @if ($apartments->services->isEmpty())
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
                   
                </tbody>
            </table>
            @else
                <p>Nessun messaggio disponibile.</p>
            @endif
        </div>
    </div>
</div> --}}
@endsection
