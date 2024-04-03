@extends('layouts.authenticated')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <h2 class="text-center mt-5 fw-bolder">INFORMAZIONI GENERALI</h2>
                <p class="text-center paragraph-padded">In questa sezione descrivi al meglio il tuo appartamento ed aggiungi
                    le informazioni fondamentali.</p>
            </div>
            <div class="col-12">
                <form action="{{ route('apartments.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{-- Descrizione appartamento --}}
                    <div class="form-group">
                        <label class="mt-3 fw-bolder" for="marca">Descrizione <span class="text-danger">*</span></label>
                        <input type="text" name="description" id="description" class="form-control"
                            placeholder="Inserisci una breve descrizione" required value="{{ old('description') }}">
                        @error('description')
                            <div class ="text-danger">{{ $message }}</div>
                        @enderror
                    </div>








                    {{-- <div class="form-group">
                <label class="mt-3" for="service_id">Servizi:</label><br>
                <div class="container">
                    <div class="row">
                        @foreach ($services as $service)
                            <div class="col-4 my-1">
                                <input type="checkbox" name="services[]" id="service-{{$service->id}}" value="{{$service->id}}" 
                                    {{ is_array(old('services')) && in_array($service->id, old('services')) ? 'checked' : '' }}>
                                <i class="{{ $service->icon }}"></i> <span>{{$service->name}}  </span><br>
                            </div>
                        @endforeach 
                        @error('services') <!-- Note the error key is 'services', not 'bathrooms' -->
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div> --}}










                    {{-- <div class="form-group">
                    <label class="container">Livello 1
                        <input type="radio" checked="checked" name="adv_level" value="1">
                        <span class="checkmark"></span>
                      </label>
                      <label class="container">Livello 2
                        <input type="radio" name="adv_level" value="2">
                        <span class="checkmark"></span>
                      </label>
                      <label class="container">Livello 3
                        <input type="radio" name="adv_level" value="3">
                        <span class="checkmark"></span>
                      </label>
                </div> --}}
            </div>

            <div class="row">
                <div class="col">
                    {{-- Numero stanze --}}
                    <div class="form-group">
                        <label class="mt-3 fw-bolder" for="rooms">Numero Stanze <span
                                class="text-danger">*</span></label>
                        <input type="text" name="rooms" id="rooms" class="form-control"
                            placeholder="Inserisci il numero delle stanze " value="{{ old('rooms') }}">
                        @error('rooms')
                            <div class ="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label class="mt-3 fw-bolder" for="beds">Letti disponibili <span
                                class="text-danger">*</span></label>
                        <input type="text" name="beds" id="beds" class="form-control"
                            placeholder="Inserisci il numero di letti " value="{{ old('beds') }}">
                        @error('beds')
                            <div class ="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    {{-- Numero bagni --}}
                    <div class="form-group">
                        <label class="mt-3 fw-bolder" for="bathrooms">Numero Bagni <span
                                class="text-danger">*</span></label>
                        <input type="text" name="bathrooms" id="bathrooms" class="form-control"
                            placeholder="Inserisci il numero di bagni " value="{{ old('bathrooms') }}">
                        @error('bathrooms')
                            <div class ="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    {{-- Metratura appartamento --}}
                    <div class="form-group">
                        <label class="mt-3 fw-bolder" for="square_meters">Metri quadrati <span
                                class="text-danger">*</span></label>
                        <input type="text" name="square_meters" id="square_meters" class="form-control"
                            placeholder="Inserisci i metri quadrati " value="{{ old('square_meters') }}">
                        @error('square_meters')
                            <div class ="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    {{-- Zona --}}
                    <div class="form-group">
                        <label class="mt-3 fw-bolder" for="location">Città <span class="text-danger">*</span></label>
                        <input type="text" name="location" id="location" class="form-control"
                            placeholder="Inserisci la città " value="{{ old('location') }}">
                        @error('location')
                            <div class ="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    {{-- Indirizzo --}}
                    <div class="form-group">
                        <label class="mt-3 fw-bolder" for="indirizzo">Indirizzo <span class="text-danger">*</span></label>
                        <div id="indirizzoSearchBox" value="{{ old('address') }}"></div>
                        @error('address')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 mt-5">
                    <h2 class="text-center mt-5 fw-bolder">IMMAGINI DEL TUO APPARTAMENTO</h2>
                    <p class="text-center paragraph-padded">Aggiungi le immagini che meglio rappresentano il tuo
                        appartamento. É preferibile aggiungere file di alta qualità.</p>
                </div>

                <div class="col-12">
                    <label for="image" class="label-primary mt-5 fw-bolder">Immagine di copertina <span
                            class="text-danger">*</span></label>
                    <div class="image-container">
                        <img id="preview-image" src="#" alt="Preview Image" style="display: none;">
                        <i class="fa-solid fa-image"></i>
                        <h2 class="text-center mt-5 text-image">Carica un'immagine</h2>
                        <p class="text-center paragraph-padded">Carica una foto del tuo appartamento da mostrare in primo
                            piano.</p>

                        {{-- Immagini appartamento --}}
                        <div class="form-group">
                            <label class="mt-3 label-cover-image" for="image"><i
                                    class="fa-solid fa-arrow-up-from-bracket me-1"></i> Carica immagine</label>
                            <input type="file" name="image" id="image" accept="image/*"
                                class="form-control input-cover-image" onchange="previewImage(event)">
                            @error('image')
                                <div class ="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" id="imageRow">
                <div class="col-3 square add-image-gallery padding-create">
                    <div class="content-square">
                        <div class="form-group">
                            <label class="mt-3 label-gallery" for="image_gallery"><i
                                    class="fa-solid fa-plus"></i></label>
                            <input type="file" name="image_gallery[]" id="image_gallery" accept="image/*"
                                class="form-control" multiple onchange="addImages(this)">
                            @error('image')
                                <div class ="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <h3>Carica foto</h3>
                    <p class="text-center mt-2 px-2">Carica ulteriori foto del tuo appartamento</p>
                </div>
            </div>

            {{-- Visibilità --}}
            <div class="form-group">
                <label class="mt-3" for="visibility">Visibilità <span class="text-danger">*</span></label>
                <input type="radio" name="visibility" value="Si">
                <label for=""> Si</label>
                <input type="radio" name="visibility" value="No">
                <label for=""> No</label>
                @error('visibility')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-footer mt-2">
                <p class="text-muted"><span class="text-danger">*</span> I campi contrassegnati sono obbligatori.</p>
            </div>

            <a href="{{ route('apartments.index') }}"><button type="submit" class="btn btn-primary mt-3"
                    id="myButton">Salva</button></a>

            </form>
        </div>
    </div>

    <script>
        function addImages(input) {
            const files = input.files;
            const imageRow = document.getElementById('imageRow');

            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                const reader = new FileReader();

                reader.onload = function(e) {
                    const col = document.createElement('div');
                    col.classList.add('col-3', 'square', 'add-image-gallery');

                    const contentSquare = document.createElement('div');
                    contentSquare.classList.add('content-square');
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    contentSquare.appendChild(img);

                    col.appendChild(contentSquare);
                    imageRow.appendChild(col);
                };

                reader.readAsDataURL(file);
            }
        }
    </script>

    <script>
        function previewImage(event) {
            var input = event.target;
            var reader = new FileReader();
            reader.onload = function() {
                var dataURL = reader.result;
                var previewImage = document.getElementById('preview-image');
                previewImage.src = dataURL;
                previewImage.style.display = 'block';
            };
            reader.readAsDataURL(input.files[0]);
        }
    </script>

    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.1.2-public-preview.15/services/services-web.min.js">
    </script>
    <script src="/tomtom-input.js"></script>
@endsection
