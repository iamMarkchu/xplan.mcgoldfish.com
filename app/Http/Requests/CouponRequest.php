<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CouponRequest extends FormRequest
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
            'merchant_id' => 'required|integer',    
            'title' => 'required|max:255|min:3',
            'promo_type' => [
                'required',
                Rule::in('deal', 'code')
            ],
            'promo_code' => 'max:255',
            'start_at' => 'required|date',
            'expire_at' => 'required|date',
            'dst_url' => 'url|max:255'
        ];
    }
}
