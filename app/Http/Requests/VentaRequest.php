<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VentaRequest extends FormRequest
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
    public function rules()
    {
        return [
            'descripcion' => 'required|alpha|max:100',
            'cant_articulos' => 'required|integer|min:1',
            'precio' => 'required|numeric|min:1',
            'fecha_venta' => 'required|date|before_or_equal:today',
        ];
    }

    public function messages()
    {
        return [
            'descripcion.required' => 'La descripción es obligatoria.',
            'descripcion.alpha' => 'La descripción debe ser un texto.',
            'descripcion.max' => 'La descripción no puede superar los 100 caracteres.',

            'cant_articulos.required' => 'Debe ingresar la cantidad de artículos.',
            'cant_articulos.integer' => 'La cantidad de artículos debe ser un número entero.',
            'cant_articulos.min' => 'La cantidad de artículos debe ser al menos 1.',

            'precio.required' => 'Debe ingresar el precio.',
            'precio.numeric' => 'El precio debe ser un número.',
            'precio.min' => 'El precio no puede ser negativo.',

            'fecha_venta.required' => 'Debe ingresar la fecha de venta.',
            'fecha_venta.date' => 'Debe ingresar una fecha válida.',
            'fecha_venta.before_or_equal' => 'La fecha de venta no puede ser posterior a hoy.',
        ];
    }
}
