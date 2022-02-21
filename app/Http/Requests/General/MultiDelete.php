<?php

namespace App\Http\Requests\General;

use Illuminate\Foundation\Http\FormRequest;

class MultiDelete extends FormRequest
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
            'data' => 'required|array',
            'data*' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'data.required' =>'يجب اختيار عنصر علي الاقل'
        ];
    }
}
