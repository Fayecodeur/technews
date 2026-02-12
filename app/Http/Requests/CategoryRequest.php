<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'description' => 'nullable|string',
            'is_active' => 'required|boolean|in:0,1',
        ];
    }
    public function messages(): array{
        return [
            'name.required' => "Le champ nom est obligatoire",
            'name.string' => "Le nom n'est pas valide",
            'name.max' => "Le nom ne doit pas dépasser 255 caractères",

            'description.string' => 'La description est invalide',

            'is_active.required' => "Le champ actif est obligatoire",
            'is_active.boolean' => "Le champ actif doit être vrai ou faux",
            'is_active.in' => "Le champ actif est non valide",
        ];
    }
}
