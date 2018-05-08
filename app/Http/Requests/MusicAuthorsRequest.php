<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MusicAuthorsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
            $rules= [

            'art_name' =>'required|max:255',
            'dsc' =>'required|max:255',
            'type_authors' =>'required',
            'x12' =>'required',
            'facebook' =>'required',
            'google' =>'required',
            'twitter' =>'required',
            'instagram' =>'required',
            'photo' => 'required|mimes:jpeg,bmp,png'
        ];

        
        return($rules);
    }
    
}
