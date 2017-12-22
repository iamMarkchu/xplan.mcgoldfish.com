<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMerchantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return TRUE;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:merchants|max:255|min:3',
            'country' => [
                'required',
                Rule::in('US', 'UK', 'CA', 'AU')
            ],
            'image_url' => 'max:255',
            'has_aff' => [
                'required',
                Rule::in('yes', 'no')
            ],
            'url_name' => 'required|max:255|unique:merchants',
            'dst_url' => 'required|url|max:255|unique:merchants',
            'facebook_url' => 'required|url|max:255',
            'important_order' => 'required|integer'
        ];
    }
}
