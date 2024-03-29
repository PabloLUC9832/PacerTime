<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEventoRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            //
            //evento
            'nombre' => 'required|string|min:1',
            'descripcion' => 'required|string|min:1',
            'lugarEvento' => 'required|string|min:1',
            'fechaInicioEvento' => 'required|string|min:1',
            'fechaFinEvento' => 'nullable|string|min:1',
            'horaEvento' => 'required|numeric|min:1',
            'minutoEvento' => 'required|numeric',
            'periodoEvento' => 'required|string|min:1',
            //imagen
            //entrega de kits
            'lugarEntregaKits' => 'required|string|min:1',
            'fechaInicioEntregaKits' => 'required|string|min:1',
            'fechaFinEntregaKits' => 'nullable|string|min:1',
            'horaInicioEntregaKits' => 'required|numeric|min:1',
            'minutoInicioEntregaKits' => 'required|numeric',
            'periodoInicioEntregaKits' => 'required|string|min:1',
            'horaFinEntregaKits' => 'nullable|min:1',
            'minutoFinEntregaKits' => 'nullable',
            'periodoFinEntregaKits' => 'nullable|string|min:1',

        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'El campo :attribute es obligatorio'
        ];
    }


}
