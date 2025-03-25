<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JouerRequest extends FormRequest
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
            'nom' => ['required','min:3'],
            'nationnalite'=>['required','min:2'],
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,JPEG,PNG,JPG,GIF,svg,SVG|max:4048',
            "date_de_naissance"=>"date|required",
            'taille'=>['required','numeric','min:100','max:220'],
            'poids'=>['required','numeric','min:40','max:200'],
            'dorsale'=>['required','numeric','min:1','max:100'],
            'but'=>['required','numeric','min:0','max:10000'],
            'passe'=>['required','numeric','min:0','max:10000'],
            'matches'=>['required','numeric','min:0','max:10000'],
            'historique'=>['required','string','min:30'],
            "post_jouer_id"=>'required|exists:post_jouers,id',


            
            
        ];
    }
    
}