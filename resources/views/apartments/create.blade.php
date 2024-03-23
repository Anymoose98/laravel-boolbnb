@extends("layouts.authenticated")

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
                <label class="mt-3" for="image">Immagine di copertina dell'appartamento</label>
                <input type="file" name="image" id="image" accept="image/*" class="form-control">
                @error('image')
                    <div class ="text-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- Numero stanze --}}
            <div class="form-group">
                <label class="mt-3" for="rooms">Numero Stanze</label>
                <input type="text" name="rooms" id="rooms" class="form-control" placeholder="rooms " > {{ old("rooms")  }}
                @error('rooms')
                    <div class ="text-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- Numero letti --}}
            <div class="form-group">
                <label class="mt-3" for="beds">Letti disponibili</label>
                <input type="text" name="beds" id="beds" class="form-control" placeholder="beds " > {{ old("beds")  }}
                @error('beds')
                    <div class ="text-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- Numero bagni --}}
            <div class="form-group">
                <label class="mt-3" for="bathrooms">Bagni</label>
                <input type="text" name="bathrooms" id="bathrooms" class="form-control" placeholder="bathrooms " > {{ old("bathrooms")  }}
                @error('bathrooms')
                    <div class ="text-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- Metratura appartamento --}}
            <div class="form-group">
                <label class="mt-3" for="square_meters">Metri quadrati</label>
                <input type="text" name="square_meters" id="square_meters" class="form-control" placeholder="square_meters " > {{ old("square_meters")  }}
                @error('square_meters')
                    <div class ="text-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- Zona --}}
            <div class="form-group">
                <label class="mt-3" for="location">Zona</label>
                <input type="text" name="location" id="location" class="form-control" placeholder="location " > {{ old("location")  }}
                @error('location')
                    <div class ="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label class="mt-3" for="address">Indirizzo</label>
                <input type="text" name="address" id="address" class="form-control" placeholder="address " > {{ old("address")  }}
                @error('address')
                    <div class ="text-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- Visibilità --}}
            <div class="form-group">
                <label class="mt-3" for="visibility">Visibilità</label>
                <input type="radio" name="visibility" value="Si">
                <label for=""  > Si</label>
                <input type="radio" name="visibility"   value="No">
                <label for="" > No</label>
                @error('visibility')
                    <div class ="text-danger">{{ $message }}</div>
                @enderror
            </div>


            <a id="myButton" href="{{ route("apartments.index")}}"><button type="submit" class="btn btn-primary mt-3 ">Salva</button></a>


            </form>
        </div>
    </div>
</div>


</body>
@endsection
