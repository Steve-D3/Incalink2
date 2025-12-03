<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePersonaRequest extends FormRequest
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
            "nombre" => "required|string|max:255",
            "edad" => "required|integer|min:1|max:120",
            "sexo" => "required|string|in:hombre,mujer,otro",
            "cedula" => "required|numeric|length:10|unique:personas,cedula",
            "telefono" => "required|numeric|length:10|unique:personas,telefono",
            "alergias" => "nullable|string|max:255",
            "alergias_varias" => "nullable|string|max:255",
            "observaciones" => "nullable|string|max:255",
            "grupo_id" => "required|exists:grupos,id",
        ];
    }
}
