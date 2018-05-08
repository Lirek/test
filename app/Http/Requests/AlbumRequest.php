<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlbumRequest extends FormRequest
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

            'album' =>'required|max:255',
            'cost' =>'required|numeric',
            'tags' =>'required',
            'artist' =>'required',
            'image' =>'required|mimes:jpeg,bmp,png',
            'audio.*' =>'required|mimes:mpga',
            'song_n.*' =>'required|max:255'
        ];

        
        return($rules);
    }
}
