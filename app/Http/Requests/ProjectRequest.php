<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProjectRequest extends FormRequest
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
            'category_id' => 'required|exists:categories,id',
            'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'description_ar' => 'required|string',
            'description_en' => 'required|string',
            'price' => 'required|numeric',
            'feature_ar' => 'required|string',
            'feature_en' => 'required|string',
            'colors' => 'nullable|array|exists:attribute_values,id',
            'addons' => 'nullable|array|exists:add_ons,id',
            'image' => [
                'nullable',
                'mimes:jpeg,jpg,png',
                Rule::requiredIf(function () {
                    return Request::routeIs('projects.store');
                })
            ],
            'images' => [
                'nullable',
                'array',
                Rule::requiredIf(function () {
                    return Request::routeIs('projects.store');
                })
            ],
        ];
    }
}
