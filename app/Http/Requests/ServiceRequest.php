<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ServiceRequest extends FormRequest
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
            'title_ar' => 'required|max:191',
            'title_en' => 'required|max:191',
            'description_ar' => 'nullable|string|max:191',
            'description_en' => 'nullable|string|max:191',
            'image' => [
                'nullable',
                'mimes:jpeg,jpg,png',
                Rule::requiredIf(function () {
                    return Request::routeIs('services.store');
                })
            ],
        ];
    }
}
