<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'is_active' => 'required|boolean',
            'is_shareable' => 'required|boolean',
            'is_commentable' => 'required|boolean',
            'category_id' => 'required|exists:categories,id',

        ];
    }
    public function messages(): array
    {
        return [
            'title.required' => 'Le titre est obligatoire.',
            'title.string' => 'Le titre doit être une chaîne de caractères.',
            'title.max' => 'Le titre ne doit pas dépasser 255 caractères.',

            'description.required' => 'La description est obligatoire.',
            'description.string' => 'La description doit être une chaîne de caractères.',


            'image.image' => 'Le fichier doit être une image.',
            'image.mimes' => 'L’image doit être au format jpeg, png ou jpg.',
            'image.max' => 'L’image ne doit pas dépasser 2 Mo.',

            'is_active.required' => 'Le statut actif est obligatoire.',
            'is_active.boolean' => 'Le statut actif doit être vrai ou faux.',

            'is_shareable.required' => 'Le statut partageable est obligatoire.',
            'is_shareable.boolean' => 'Le statut partageable doit être vrai ou faux.',

            'is_commentable.required' => 'Le statut commentable est obligatoire.',
            'is_commentable.boolean' => 'Le statut commentable doit être vrai ou faux.',

            'category_id.required' => 'La catégorie est obligatoire.',
            'category_id.exists' => 'La catégorie sélectionnée est invalide.',
        ];
    }

}
