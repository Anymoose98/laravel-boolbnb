@extends("layouts.app")

@section("content")

<div class="container">
    <div class="row">
        <div class="col-12">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <h2 class="text-center">Aggiungi dati auto</h2>
        </div>
        <div class="col-12">
            <form action="{{ route("apartments.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- Descrizione appartamento --}}
            <div class="form-group">
                <label class="mt-3" for="marca">Descrizione</label>
                <input type="text" name="description" id="description" class="form-control" placeholder="description" required  value="{{ old("description")  }}">
                @error('description')
                    <div class ="text-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- Immagini appartamento --}}
            <div class="form-group">
                <label class="mt-3" for="cover_image">Immagine di copertina dell'auto</label>
                <input type="file" name="cover_image" id="cover_image" accept="image/*" class="form-control">
                @error('cover_image')
                    <div class ="text-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- Numero stanze --}}
            <div class="form-group">
                <label class="mt-3" for="rooms">Numero Stanze</label>
                <textarea type="text" name="rooms" id="rooms" class="form-control" placeholder="rooms " > {{ old("rooms")  }}</textarea>
                @error('rooms')
                    <div class ="text-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- Numero letti --}}
            <div class="form-group">
                <label class="mt-3" for="beds">Letti disponibili</label>
                <textarea type="text" name="beds" id="beds" class="form-control" placeholder="beds " > {{ old("beds")  }}</textarea>
                @error('beds')
                    <div class ="text-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- Numero bagni --}}
            <div class="form-group">
                <label class="mt-3" for="bathrooms">Bagni</label>
                <textarea type="text" name="bathrooms" id="bathrooms" class="form-control" placeholder="bathrooms " > {{ old("bathrooms")  }}</textarea>
                @error('bathrooms')
                    <div class ="text-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- Metratura appartamento --}}
            <div class="form-group">
                <label class="mt-3" for="square_meters">Metri quadrati</label>
                <textarea type="text" name="square_meters" id="square_meters" class="form-control" placeholder="square_meters " > {{ old("square_meters")  }}mq</textarea>
                @error('square_meters')
                    <div class ="text-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- Zona --}}
            <div class="form-group">
                <label class="mt-3" for="location">Zona</label>
                <textarea type="text" name="location" id="location" class="form-control" placeholder="location " > {{ old("location")  }}</textarea>
                @error('location')
                    <div class ="text-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- Visibilità --}}
            <div class="form-group">
                <label class="mt-3" for="visibility">Visibilità</label>
                <input type="radio" name="apartments_visibility"  class="form-check-input mx-2" value="Si">
                <input type="radio" name="apartments_visibility"  class="form-check-input mx-2" value="No">
                @error('visibility')
                    <div class ="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <a href="{{ route("apartments.index")}}"><button type="submit" class="btn btn-primary mt-3 ">Salva</button></a>
            
            </form>
        </div>
    </div>
</div>
</body>
@endsection