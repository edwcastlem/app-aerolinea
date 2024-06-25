<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VueloRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nroVuelo' => ['required', 'string'],
            'origen' => ['required', 'string'],
            'destino' => ['required', 'string'],
            'fechaSalida' => ['required', 'date'],
            'fechaLlegada' => ['required', 'date'],
            'precio' => ['required', 'decimal:2'], 
            'terminal' => ['string'],
            'puerta' => ['string'],
            //'estadoVuelo' => $vuelo->estadoVuelo->estado,
            //'avion' => $vuelo->avion->modelo,
        ];
    }
}
