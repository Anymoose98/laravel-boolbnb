@extends('layouts.authenticated')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 mt-4">
                <div class="d-flex justify-content-between">
                    <div>
                        <h2>I tuoi appartamenti</h2>
                    </div>

                    <div>
                        <a href=" {{ route('apartments.create') }} "><button class="btn btn-primary">Aggiungi un nuovo
                                Appartamento</button></a>
                    </div>
                </div>
            </div>

            @foreach ($apartment as $apartments)
                <div class="col-6 my-3">
                    <div class="card">
                        <img src="{{ asset('/storage/' . $apartments->image) }}" alt="{{ $apartments->name }}"
                            class="card-img-top img-index">
                        <div class="card-body">
                            <h3 class="card-title">
                                {{ $apartments->description }}
                            </h3>
                            <h5 class="card-text">{{ $apartments->location }}</h5>
                            <a href="{{ route('apartments.show', ['apartment' => $apartments->id]) }}">
                                <button class="btn btn-sm btn-square btn-primary">Clicca qui per maggiori
                                    informazioni</button>
                            </a>
                        </div>
                        <div class="d-flex position-absolute m-1 top-0 end-0">
                            <a href="{{ route('apartments.edit', ['apartment' => $apartments->id]) }}"><button
                                    class="btn btn-sm btn-square btn-warning "><i class="fas fa-edit"></i></button></a>
                            <button class="btn btn-sm btn-square btn-danger mx-1" data-bs-toggle="modal"
                                data-bs-target="#modal_project_delete-{{ $apartments->id }}"
                                data-id= "{{ $apartments->id }}" data-name="{{ $apartments->description }}"
                                data-type="apartments"><i class="fa-solid fa-trash"></i>
                            </button>
                            <a href="{{ route('sponsorship.create', ['apartment_id' => $apartments->id]) }}">Sponsorizza</a>                        </div>
                    </div>
                </div>
                @include('apartments.modal_delete')
                @endforeach

            {{--  class="col-12 d-flex flex-wrap"> --}}

            {{-- Tabella con le informazione relative all'appartamento --}}
            {{-- <table class=" table mt-3 table-striped text-center">
                    <thead>
                        <tr>

                            <th>Descrizione</th>
                            <th>Stanze</th>
                            <th>Letti</th>
                            <th>Bagni</th>
                            <th>Metri quadrati</th>
                            <th>Zona</th>
                            <th>Tools</th>
                        </tr>
                    </thead>
                    <tbody>
                          @foreach ($apartment as $apartments)
                            <tr>
                                <td>{{ $apartments->description}}</td>
                                <td>{{ $apartments->rooms}}</td>
                                <td>{{ $apartments->beds}}</td>
                                <td>{{ $apartments->bathrooms}}</td>
                                <td>{{ $apartments->square_meters}}mq</td>
                                <td>{{ $apartments->location}}</td>

                               <td> --}}
            {{-- Bottone che rimanda alla show --}}
            {{-- <a href="{{ route("apartments.show", ["apartment" => $apartments->id ])}}"><button class="btn btn-sm btn-square btn-primary"><i class="fas fa-eye"></i></button></a> --}}
            {{-- Bottone che rimanda all'edit --}}
            {{-- <a href="{{ route("apartments.edit", ["apartment" => $apartments->id ])}}"><button class="btn btn-sm btn-square btn-warning"><i class="fas fa-edit"></i></button></a> --}}
            {{-- Bottone che richiama la modale --}}
            {{-- <button class="btn btn-sm btn-square btn-danger" data-bs-toggle="modal" --}}
            {{-- data-bs-target="#modal_project_delete-{{ $apartments->id }}"
                                            data-id= "{{ $apartments->id }}" data-name="{{ $apartments->description }}" data-type="apartments">Elimina
                                            @include("apartments.modal_delete")
                                    </button>
                                 </td>

                            </tr>
                            @endforeach --}}
            {{-- </tbody> --}}
            {{-- </table> --}}

        </div>
    </div>
@endsection
