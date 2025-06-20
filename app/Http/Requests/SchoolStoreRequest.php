<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SchoolStoreRequest extends FormRequest
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
            'rut' => 'required|string|max:10|min:9|unique:schools,rut',
            'region' => 'required|',
            'commune' => 'required|',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:9|min:9',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'El campo nombres es obligatorio.',
            'rut.required' => 'El campo rut es obligatorio.',
            'rut.max' => 'Recuerda ingresar el RUT sin puntos y con GUION.',
            'rut.min' => 'Recuerda ingresar el RUT sin puntos y con GUION.',
            'rut.unique' => 'El rut ya ha sido utilizado por un Colegio.',
            'region.required' => 'El campo region es obligatorio.',
            'commune.required' => 'El campo comuna es obligatorio.',
            'address.required' => 'El campo direccion es obligatorio.',
            'phone.required' => 'El campo telefono es obligatorio.',
            'phone.min' => 'El campo telefono debe tener 9 digitos',
            'phone.max' => 'El campo telefono debe tener 9 digitos.',
        ];
    }
}