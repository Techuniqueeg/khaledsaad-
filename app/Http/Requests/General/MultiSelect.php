<?php

namespace App\Http\Requests\General;

use Illuminate\Foundation\Http\FormRequest;

class MultiSelect extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
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
            'data.required' => __('lang.select_least_one')
        ];
    }
}
