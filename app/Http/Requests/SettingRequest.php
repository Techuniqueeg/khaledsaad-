<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'logo' => 'nullable|mimes:jpeg,jpg,png',
            'site_name_ar' => 'nullable|string|max:191',
            'site_name_en' => 'nullable|string|max:191',
            'phone' => 'nullable|numeric|min:11|regex:/^([0-9\s\-\+\(\)]*)$/',
            'facebook' => 'nullable|url|max:191',
            'email' => 'nullable|email|max:191',
            'location_ar' => 'nullable|string|max:191',
            'location_en' => 'nullable|string|max:191',
            'instagram' => 'nullable|url|max:191',
            'whatsapp' =>  'nullable|numeric|min:11|regex:/^([0-9\s\-\+\(\)]*)$/',
            'description_ar' => 'nullable|string|max:191',
            'description_en' => 'nullable|string|max:191',
            'copyright_ar' => 'nullable|string|max:191',
            'copyright_en' => 'nullable|string|max:191',
        ];
    }
}
