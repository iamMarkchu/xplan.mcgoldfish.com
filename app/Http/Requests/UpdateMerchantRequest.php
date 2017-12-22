<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class UpdateMerchantRequest extends FormRequest
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
        $id = $this->route('merchant')->id;
        return [
            'name' => 'required|max:255|min:3|unique:merchants,name,' .$id,
            'country' => [
                'required',
                Rule::in('US', 'UK', 'CA', 'AU')
            ],
            'image_url' => 'max:255',
            'has_aff' => [
                'required',
                Rule::in('yes', 'no')
            ],
            'dst_url' => 'required|url|max:255|unique:merchants,dst_url,' .$id,
            'facebook_url' => 'url|max:255',
            'important_order' => 'required|integer'
        ];
    }
}
