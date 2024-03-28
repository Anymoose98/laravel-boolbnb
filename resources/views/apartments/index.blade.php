@extends("layouts.authenticated")

@section("content")
    <div class="container">
        <div class="row">
            <div class="col-12 mt-4">
               <div class="d-flex justify-content-between">
                    <div>
                        <h2>I tuoi appartamenti</h2>
                    </div>

                    <div>
                        <a href=" {{ route("apartments.create")}} "><button class="btn btn-primary">Aggiungi un nuovo Appartamento</button></a>
                    </div>
               </div>
            </div>
            <div class="col-12">
                {{-- @foreach($apartment as $apartments)
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset("/storage/" . $apartments->image) }}" alt="{{ $apartments->name}}"" class="card-img-top">
                    <div class="card-body">
                      <h5 class="card-title"><td>{{ $apartments->description}}</td></h5>
                      <p class="card-text">{{ $apartments->location}}</p>
                      <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                  </div>
                @endforeach --}}
                {{-- Tabella con le informazione relative all'appartamento --}}
                <table class=" table mt-3 table-striped text-center">
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
                          @foreach($apartment as $apartments)
                            <tr>
                                <td>{{ $apartments->description}}</td>
                                <td>{{ $apartments->rooms}}</td>
                                <td>{{ $apartments->beds}}</td>
                                <td>{{ $apartments->bathrooms}}</td>
                                <td>{{ $apartments->square_meters}}mq</td>
                                <td>{{ $apartments->location}}</td>

                               <td>
                                    {{-- Bottone che rimanda alla show --}}
                                    <a href="{{ route("apartments.show", ["apartment" => $apartments->id ])}}"><button class="btn btn-sm btn-square btn-primary"><i class="fas fa-eye"></i></button></a>
                                    {{-- Bottone che rimanda all'edit --}}
                                    <a href="{{ route("apartments.edit", ["apartment" => $apartments->id ])}}"><button class="btn btn-sm btn-square btn-warning"><i class="fas fa-edit"></i></button></a>
                                    {{-- Bottone che richiama la modale --}}
                                    <button class="btn btn-sm btn-square btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#modal_project_delete-{{ $apartments->id }}"
                                            data-id= "{{ $apartments->id }}" data-name="{{ $apartments->description }}" data-type="apartments">Elimina
                                        </button>
                                    @include("apartments.modal_delete")
                                 </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    @endsection
