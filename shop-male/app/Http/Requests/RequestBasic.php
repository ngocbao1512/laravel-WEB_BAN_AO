<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\MyRules;

class RequestBasic extends FormRequest
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
            'name' => ['required', 'max:15', new MyRules],
            'price' => ['required','numeric'],
            'sale_off' => ['required','numeric'],
            'description' => ['required','max:50'],
        ];
    }

}
