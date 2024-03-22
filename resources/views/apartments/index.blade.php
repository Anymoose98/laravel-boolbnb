@extends("layouts.app")

@section("content")
    <div class="container">
        <div class="row">
            <div class="col-12 mt-4">
               <div class="d-flex justify-content-between">
                    <div>
                        <h2>Apartments</h2>
                    </div>

                    <div>
                        <a href=" {{ route("apartments.create")}} "><button class="btn btn-primary">Add New Apartment</button></a>
                    </div>    
               </div>
            </div>
            <div class="col-12">
                <table class=" table mt-3 table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Descrizione</th>
                            <th>Stanze</th>
                            <th>Letti</th>
                            <th>Bagni</th>
                            <th>Metri quadrati</th>
                            <th>Zona</th>
                        </tr>
                    </thead>
                    <tbody>
                          @foreach($apartment as $apartments)
                            <tr>
                                <td>{{ $apartments->id}}</td>
                                <td>{{ $apartments->description}}</td>
                                <td>{{ $apartments->rooms}}</td>
                                <td>{{ $apartments->beds}}</td>
                                <td>{{ $apartments->bathrooms}}</td>
                                <td>{{ $apartments->square_meters}}mq</td>
                                <td>{{ $apartments->location}}</td>
                                
                               <td>
                                    <a href="{{ route("apartments.show", ["apartment" => $apartments->id ])}}"><button class="btn btn-sm btn-square btn-primary"><i class="fas fa-eye"></i></button></a>
                                    <a href="{{ route("apartments.edit", ["apartment" => $apartments->id ])}}"><button class="btn btn-sm btn-square btn-warning"><i class="fas fa-edit"></i></button></a>
                                  {{--   <button class="btn btn-sm btn-square btn-danger" data-bs-toggle="modal" 
                                        data-bs-target="#modal_project_delete-{{ $car->id }}" 
                                        data-id= "{{ $car->id }}" data-name="{{ $car->name }}" data-type="cars">Elimina
                                    </button>
                                
                                    @include("admin.cars.modal_delete")
 --}}
                                </td> 
                        
                            </tr>
                            @endforeach  
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
    @endsection