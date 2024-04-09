@extends('layouts.show')

@section('content')
    <div class="main-content-show">
        <div class="photo-container-show d-lg-block d-none">
            <div class="photo-fixed">
                <img src="{{ asset('/storage/' . $apartments->image) }}" alt="{{ $apartments->name }}">
            </div>
        </div>


        <div class="info-window-show">
            <div class="info-container-show">
                <div class="info-section-show">
                        <div class="mobile-photo-container d-block d-lg-none">
                            <img class="mobile-photo" src="{{ asset('/storage/' . $apartments->image) }}" alt="{{ $apartments->name }}">
                        </div>

                    <span class="click-num">• {{ $totalClicks }} Click(s)</span>
                    <h1 class="address-show">{{ $apartments->address }}</h1>
                    <p class="description-show">{{ $apartments->description }}</p>
                </div>

                <div class="info-section-show">
                    <h4 class="title-info-show">Dettagli</h4>
                    <ul class="list-unstyled mt-3">
                        <li>
                            <i class="fa-solid fa-maximize main-color"></i><span class="ms-2 fw-bold main-color">Dimensioni:
                                <span class="fw-light text-dark">{{ $apartments->square_meters }} mq</span></span>
                        </li>
                        <li>
                            <i class="fa-solid fa-door-open main-color"></i><span class="ms-2 fw-bold main-color">Numero
                                Stanze: <span class="fw-light text-dark">{{ $apartments->rooms }}</span></span>
                        </li>
                        <li>
                            <i class="fa-solid fa-bed main-color"></i><span class="ms-2 fw-bold main-color">Numero
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
                    {{-- <span class="click-num">• {{ $clicks }} Click(s) questo mese</span> --}}
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
                        @if ($message->isEmpty())
                            <div class="single-message-show">
                                Non sono presenti messaggi.
                            </div>
                        @else
                            @foreach ($message as $index => $msg)
                                <div class="single-message-show">
                                    <div class="accordion accordion-flush" id="accordionFlushExample{{ $index }}">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#flush-collapseOne{{ $index }}"
                                                    aria-expanded="false"
                                                    aria-controls="flush-collapseOne{{ $index }}">
                                                    {{ $msg->email }}
                                                </button>
                                            </h2>
                                            <div id="flush-collapseOne{{ $index }}"
                                                class="accordion-collapse collapse"
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
                        @endif
                    </div>
                </div>

                <div class="info-section-show mb-5">
                    <h4 class="title-info-show">Click al mese</h4>
                    <canvas id="myChart" width="400" height="200"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const labels = [];
    for (let i = 12; i >= 0; i--) {
        labels.push(moment().subtract(i, 'months').format('MMM'));
    }

    const data = {
        labels: labels,
        datasets: [{
            label: 'Clicks',
            data: <?php echo json_encode($dataValues); ?>,
            fill: false,
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.1
        }]
    };

    const config = {
        type: 'line',
        data: data,
    };

    var myChart = new Chart(
        document.getElementById('myChart'),
        config
    );
</script>
    
@endsection