<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisUsu extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'txtusu' =>'required|string',
            'txtemail' =>'required|email|unique:users,email',
            'txtpass'=>'required|min:4',
            'txtpass_v' => 'required|same:txtpass'
        ];
    }
}
