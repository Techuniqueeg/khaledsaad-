<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name_ar' => 'required|max:191',
            'name_en' => 'required|max:191',
            'parent_id' => 'nullable|exists:categories,id|required_with:image',
            'image' => [
                'nullable',
                'required_with:parent_id',
                'mimes:jpeg,jpg,png'],
        ];
    }
}
