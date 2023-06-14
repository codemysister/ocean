<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class SliderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::user()->hasRole('admin');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $rules = [
            'caption' => 'required|min:5',
            'status' => 'required'
        ];

        if ($this->isMethod('PATCH')) {
            $rules['img'] = 'nullable';
        } else {
            $rules['img'] = 'required|mimes:png,jpg';
        }

        return $rules;
    }
}
