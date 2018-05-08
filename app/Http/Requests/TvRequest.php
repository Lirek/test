<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TvRequest extends FormRequest
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
            'name_r'        =>      'required|min:2|max:12',
            'streaming'     =>      'required|min:5|max:200',
            'email_c'       =>      'required',
            'logo'          =>      'required'
        ];
    }
}
