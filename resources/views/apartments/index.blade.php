@extends("layouts.app")

@section("content")
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
   
@endsection