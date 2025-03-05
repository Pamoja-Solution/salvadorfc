<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class CalendrierValidator extends FormRequest
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
            'titre' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after:date_debut',
            'type_id' => 'required|exists:types,id',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,JPEG,PNG,JPG,GIF,svg,SVG|max:4048',
            'slug' => ['required', 'min:8' ,'regex:/^[0-9a-z\-]+$/', Rule::unique('calendriers', 'slug')->ignore($this->calendrier?->id)],  


        ];
    }
    protected function prepareForValidation(){
        $this->merge([
            'slug' => $this->input('slug') ?: Str::slug($this->input('titre')) 
        ]);
    }
}
