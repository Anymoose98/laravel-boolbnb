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
            <h2 class="text-center mt-3">Aggiungi dati appartamento</h2>
        </div>
        <div class="col-12">
            <form action="{{ route("apartments.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- Descrizione appartamento --}}
            <div class="form-group">
                <label class="mt-3" for="marca">Descrizione <span class="text-danger">*</span></label>
                <input type="text" name="description" id="description" class="form-control" placeholder="Inserisci una breve descrizione" required  value="{{ old("description")  }}">
                @error('description')
                    <div class ="text-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- Immagini appartamento --}}
            <div class="form-group">
                <label class="mt-3" for="image">Immagine di copertina dell'appartamento <span class="text-danger">*</span></label>
                <input type="file" name="image" id="image" accept="image/*" class="form-control">
                @error('image')
                    <div class ="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label class="mt-3" for="image_gallery">Seleziona le immagini dell'appartamento</label>
                <input type="file" name="image_gallery[]" id="image_gallery" accept="image/*" class="form-control" multiple>
                @error('image')
                    <div class ="text-danger">{{ $message }}</div>
                @enderror
            </div>
          
            {{-- Numero stanze --}}
            <div class="form-group">
                <label class="mt-3" for="rooms">Numero Stanze <span class="text-danger">*</span></label>
                <input type="text" name="rooms" id="rooms" class="form-control" placeholder="Inserisci il numero delle stanze " value="{{ old("rooms")  }}" > 
                @error('rooms')
                    <div class ="text-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- Numero letti --}}
            <div class="form-group">
                <label class="mt-3" for="beds">Letti disponibili <span class="text-danger">*</span></label>
                <input type="text" name="beds" id="beds" class="form-control" placeholder="Inserisci il numero di letti " value="{{ old("beds")  }}"> 
                @error('beds')
                    <div class ="text-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- Numero bagni --}}
            <div class="form-group">
                <label class="mt-3" for="bathrooms">Numero Bagni <span class="text-danger">*</span></label>
                <input type="text" name="bathrooms" id="bathrooms" class="form-control" placeholder="Inserisci il numero di bagni " value="{{ old("bathrooms")  }}" > 
                @error('bathrooms')
                    <div class ="text-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- Metratura appartamento --}}
            <div class="form-group">
                <label class="mt-3" for="square_meters">Metri quadrati <span class="text-danger">*</span></label>
                <input type="text" name="square_meters" id="square_meters" class="form-control" placeholder="Inserisci i metri quadrati " value="{{ old("square_meters")  }}"> 
                @error('square_meters')
                    <div class ="text-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- Zona --}}
            <div class="form-group">
                <label class="mt-3" for="location">Città <span class="text-danger">*</span></label>
                <input type="text" name="location" id="location" class="form-control" placeholder="Inserisci la città " value="{{ old("location")  }}"> 
                @error('location')
                    <div class ="text-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- Indirizzo --}}
            <div class="form-group">
                <label class="mt-3" for="address">Indirizzo</label>
                <input type="text" name="address" id="address" class="form-control" placeholder="Inserisci la via" value="{{ old("address")  }}">
                <input type="text" id="autocomplete-input" placeholder="Enter a location...">
                <ul id="suggestions"></ul>
            
                <script>
                    const autocompleteInput = document.getElementById('autocomplete-input');
                    const suggestionsList = document.getElementById('suggestions');
            
                    autocompleteInput.addEventListener('input', function() {
                        const searchTerm = this.value.trim();
            
                        if (searchTerm.length === 0) {
                            suggestionsList.innerHTML = ''; // Clear suggestions if search term is empty
                            return;
                        }
            
                        axios.get('/autocomplete', {
                            params: {
                                search: searchTerm
                            }
                        })
                        .then(response => {
                            const suggestions = response.data;
                            displaySuggestions(suggestions);
                        })
                        .catch(error => {
                            console.error('Error fetching autocomplete data:', error);
                        });
                    });
            
                    function displaySuggestions(suggestions) {
                        suggestionsList.innerHTML = '';
            
                        suggestions.forEach(suggestion => {
                            const listItem = document.createElement('li');
                            listItem.textContent = suggestion;
                            suggestionsList.appendChild(listItem);
                        });
                    }
                </script>
                   

                @error('address')
                    <div class ="text-danger">{{ $message }}</div>
                @enderror
            </div>
            
            {{-- Visibilità --}}
            <div class="form-group">
                <label class="mt-3" for="visibility">Visibilità <span class="text-danger">*</span></label>
                <input type="radio" name="visibility" value="Si">
                <label for=""  > Si</label>
                <input type="radio" name="visibility"   value="No">
                <label for="" > No</label>
                @error('visibility')
                    <div class ="text-danger">{{ $message }}</div>
                @enderror
            </div>


            <a  href="{{ route("apartments.index")}}"><button type="submit" class="btn btn-primary mt-3" id="myButton">Salva</button></a>


            </form>
        </div>
    </div>
</div>


</body>
@endsection
