<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePropertyRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'address' => ['required', 'max:255'],
            'city' => ['required'],
            'zip_code' => ['required'],
            'listing_type' => ['required'],
            'build_year' => ['required'],
            'price' => ['required'],
            'bedrooms' => ['required'],
            'bathrooms' => ['required'],
            'sqft' => ['required'],
            'price_sqft' => ['required'],
            'property_type' => ['required'],
            'status' => ['required'],
        ];
    }
}
