<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBrokerRequest extends FormRequest
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
            'name' => ['sometimes', 'max:255'],
            'address' => ['sometimes', 'max:255'],
            'city' => ['sometimes'],
            'zip_code' => ['sometimes'],
            'phone_number' => ['sometimes', 'max:15'],
            'logo_path' => ['sometimes'],
        ];
    }
}
