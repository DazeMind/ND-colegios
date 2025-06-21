<?php

namespace App\Http\Requests;

use App\Rules\RutChileno;
use Illuminate\Foundation\Http\FormRequest;

class InstitutionStoreRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'rut' => ['required', 'string', 'max:10', 'unique:institutions', new RutChileno],
            'region' => 'required|int',
            'commune' => 'required|int',
            'address' => 'required|string|max:255',
            'phone' => 'string|nullable|max:9|min:9',
            'start_date' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'El campo nombres es obligatorio.',
            'rut.required' => 'El campo rut es obligatorio.',
            'rut.max' => 'Recuerda ingresar el RUT sin puntos y con GUION.',
            'rut.min' => 'Recuerda ingresar el RUT sin puntos y con GUION.',
            'rut.unique' => 'El rut ya ha sido utilizado por una Institucion.',
            'region.required' => 'El campo region es obligatorio.',
            'commune.required' => 'El campo comuna es obligatorio.',
            'address.required' => 'El campo direccion es obligatorio.',
            'phone.min' => 'El campo telefono debe tener 9 digitos',
            'phone.max' => 'El campo telefono debe tener 9 digitos.',
            'start_date.required' => 'El campo Fecha Inicio es obligatorio.',
        ];
    }
}
