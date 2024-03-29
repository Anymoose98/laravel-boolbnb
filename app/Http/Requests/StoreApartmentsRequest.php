<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreApartmentsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "description" => "required|max:255",
            "rooms" => "required|numeric|gt:0",
            "beds" => "required|numeric|gt:0",
            "bathrooms" => "required|numeric|gt:0",
            "square_meters" => "required|numeric|gt:0",
            "location" => "required|max:255",
            "address" => "required|max:255",
            "image" => "required",
            "visibility" => "required",
        ];
    }
    public function messages(){
        return [
            "description.required" => "Il campo descrizione è obbligatorio",
            "description.max" => "Il campo descrizione deve essere di massimo 255 caratteri",
            "rooms.required" => "Il campo rooms è obbligatorio",
            "rooms.numeric" => "Il campo rooms deve essere un numero",
            "rooms.gt0" => "Il campo rooms deve essere maggiore di 0",
            "beds.required" => "Il campo letti disponibili è obbligatorio",
            "beds.numeric" => "Il campo letti disponibili deve essere un numero",
            "beds.gt0" => "Il campo letti disponibili deve essere maggiore di 0",
            "bathrooms.required" => "Il campo bagni è obbligatorio",
            "bathrooms.numeric" => "Il campo bagni deve essere un numero",
            "bathrooms.gt0" => "Il campo bagni deve essere maggiore di 0",
            "square_meters.required" => "Il campo bagni è obbligatorio",
            "square_meters.numeric" => "Il campo bagni deve essere un numero",
            "square_meters.gt0" => "Il campo bagni deve essere maggiore di 0",
            "location.max" => "Il campo location deve essere di massimo 255 caratteri",
            "image.required" => "Il campo immagine di copertina è obbligatorio",
            "address.required" => "Il campo indirizzo è obbligatorio",
            "address.max" => "Il campo indirizzo deve essere di massimo 255 caratteri",
            "visibility.required" => "Seleziona uno dei due bottoni",
        ];
    }
}
