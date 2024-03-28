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
            <h2 class="text-center">Modifica dati appartamento</h2>
        </div>
        <div class="col-12">
            <form action="{{ route("apartments.update", $apartments->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")
            {{-- Descrizione appartamento --}}
            <div class="form-group">
                <label class="mt-3" for="marca">Descrizione <span class="text-danger">*</span></label>
                <input type="text" name="description" id="description" class="form-control" placeholder="Inserisci una breve descrizione" required  value="{{ old("description") ?? $apartments->description }}">
                @error('description')
                    <div class ="text-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- Immagini appartamento --}}
            <div class="form-group">
                <label class="mt-3" for="image">Immagine di copertina dell'appartamento <span class="text-danger">*</span></label>
                <div class="my-3">

                    <img src="{{ asset("/storage/" . $apartments->image) }}" alt="{{ $apartments->name}}" class="img-show" >
                </div>
                
                
                @if (old('image'))
                <input type="file" name="image" id="image" value="{{ old('image') }}"><br>
                @else
                <!-- If no old image input, provide a file input -->
                <input type="file" name="image" id="image"><br>
                @endif
                
                @error('image')
                    <div class ="text-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- Numero stanze --}}
            <div class="form-group">
                <label class="mt-3" for="rooms">Numero Stanze <span class="text-danger">*</span></label>
                <input type="text" name="rooms" id="rooms" class="form-control" placeholder="Inserisci il numero delle stanze" value="{{ old("rooms") ?? $apartments->rooms }}">
                @error('rooms')
                    <div class ="text-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- Numero letti --}}
            <div class="form-group">
                <label class="mt-3" for="beds">Letti disponibili <span class="text-danger">*</span></label>
                <input type="text" name="beds" id="beds" class="form-control" placeholder="Inserisci il numero di letti "  value="{{ old("beds") ?? $apartments->beds }}"> 
                @error('beds')
                    <div class ="text-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- Numero bagni --}}
            <div class="form-group">
                <label class="mt-3" for="bathrooms">Bagni <span class="text-danger">*</span></label>
                <input type="text" name="bathrooms" id="bathrooms" class="form-control" placeholder="Inserisci il numero di bagni " value="{{ old("bathrooms") ?? $apartments->bathrooms }}" > 
                @error('bathrooms')
                    <div class ="text-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- Metratura appartamento --}}
            <div class="form-group">
                <label class="mt-3" for="square_meters">Metri quadrati <span class="text-danger">*</span></label>
                <input type="text" name="square_meters" id="square_meters" class="form-control" placeholder="Inserisci i metri quadrati" value="{{ old("square_meters") ?? $apartments->square_meters }}"> 
                @error('square_meters')
                    <div class ="text-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- Indirizzo --}}
            <div class="form-group">
                <label class="mt-3" for="indirizzo">Indirizzo<span class="text-danger">*</span></label>
                <div id="indirizzoSearchBox"></div>
                @error('address')
                <div class="text-danger">{{ $message }}</div>
                @enderror
           </div>
            {{-- Visibilità --}}
            <div class="form-group">
                <label class="mt-3" for="visibility">Visibilità <span class="text-danger" >*</span></label>
                <input type="radio" name="visibility"  value="Si" {{ old('visibility', $apartments->visibility) == 'Si' ? 'checked' : '' }}>
                <label for=""  > Si</label>
                <input type="radio" name="visibility"   value="No" {{ old('visibility', $apartments->visibility) == 'No' ? 'checked' : '' }}>
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
<script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.1.2-public-preview.15/services/services-web.min.js"></script>
<script src="/tomtom-input.js"></script>
<script>
const decodeAddress = (address) => {
    const encodedAddress = '{{ $address }}';
    const replacedAddress = encodedAddress.replace(/\+/g, ' ');
    const decodedAddress = decodeURIComponent(replacedAddress);

    return decodedAddress;
}

document.addEventListener("DOMContentLoaded", function() {
    let inputAddress = document.querySelectorAll('.tt-search-box-input');

    let string = '{{ $address }}';

    console.log(decodeAddress(string));

    inputAddress.forEach((element) => {
        element.value = decodeAddress(string);
    });

    console.log(inputAddress);
});

</script>
</body>
@endsection