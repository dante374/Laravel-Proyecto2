<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VendedorRequest extends FormRequest
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
        'nombre' => 'required|alpha|max:20',
        'apellido' => 'required|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ -]+$/u|max:40',
        'email' => 'required|email|unique:vendedor,email,' . $this->vendedor?->id,
        'telefono' => 'required|string|max:20',
        'direccion' => 'required|string|max:255',
        'fecha_nacimiento' => 'required|date', // obligatorio y tipo fecha
    ];
}

public function messages(): array
{
    return [
        'nombre.required' => 'El nombre es obligatorio.',
        'nombre.max' => 'La cantidad de caracteres de nombre no debe superar los 20',
        'nombre.alpha' => 'El nombre debe ser solo texto',
        'apellido.required' => 'El apellido es obligatorio.',
        'apellido.max' => 'La cantidad de caracteres de apellido no debe superar los 40',
        'apellido.regex' => 'El apellido debe ser solo texto',
        'email.required' => 'El email es obligatorio.',
        'email.email' => 'El email debe ser válido.',
        'email.unique' => 'El email ya existe.',
        'telefono.required' => 'El teléfono es obligatorio.',
        'telefono.max' => 'La cantidad de caracteres de telefono no debe superar los 20',
        'direccion.required' => 'La dirección es obligatoria.',
        'fecha_nacimiento.required' => 'La fecha de nacimiento es obligatoria.',
        'fecha_nacimiento.date' => 'La fecha de nacimiento debe ser una fecha válida.',
    ];
 }
}
