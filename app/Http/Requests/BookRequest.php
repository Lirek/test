<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
        return [
            'title'             =>          'required|min:2|max:50',
            'original_title'    =>          'required|min:2|max:50',
            'cover'             =>          'required',
            'sinopsis'          =>          'min:3|max:150',
//            'books_files'       =>          'required|mimes:pdf'

        ];
    }
}
