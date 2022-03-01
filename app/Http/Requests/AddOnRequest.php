<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddOnRequest extends FormRequest
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
            'price'=>'required|numeric',
            'name_ar'=>'required|max:191|string',
            'name_en'=>'required|max:191|string',
        ];
    }
}
