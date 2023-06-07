<?php

namespace App\Http\Requests\Mitra;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::user()->hasRole('mitra');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $rules = [
            'logo' => 'required|image|mimes:png,jpg',
            'description' => 'required|min:10',
            'address' => 'required|min:10',
            'website' => 'required|min:5'
        ];

        return $rules;
    }
}
