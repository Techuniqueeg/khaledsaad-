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
            'location_id' => 'required|exists:locations,id',
            'type_id' => 'required|exists:types,id',
            'name' => 'required|string|max:255',
            'area_from' => 'required|numeric',
            'area_to' => 'required|numeric',
            'price_from' => 'required|numeric',
            'price_to' => 'required|numeric',
            'description' => 'required|string',
            'feature' => 'required|string',
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
