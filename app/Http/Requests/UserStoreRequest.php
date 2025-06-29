<?php

namespace App\Http\Requests;

use App\Rules\RutChileno;
use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'surnames' => 'required|string|max:255',
            'rut' => ['required', 'string', 'max:10', 'unique:users', new RutChileno],
            'phone' => 'required|string|min:9|max:9',
            'email' => 'required|string|lowercase|email|max:255|unique:users,email',
            'schools_ids' => 'required|array',
        ];
    }
     public function messages()
    {
        return [
            'name.required' => 'El campo nombres es obligatorio.',
            'surnames.required' => 'El campo apellidos es obligatorio.',
            'email.required' => 'El campo correo es obligatorio.',
            'rut.required' => 'El campo rut es obligatorio.',
            'rut.max' => 'Recuerda ingresar el RUT sin puntos y con GUION.',
            'rut.min' => 'Recuerda ingresar el RUT sin puntos y con GUION.',
            'rut.unique' => 'El rut ya ha sido utilizado por un usuario.',
            'phone.required' => 'El campo telefono es obligatorio.',
            'phone.min' => 'El campo telefono debe tener 9 digitos',
            'phone.max' => 'El campo telefono debe tener 9 digitos.',
            'schools_ids.required' => 'El campo Colegios asociados es obligatorio.',
        ];
    }
}
