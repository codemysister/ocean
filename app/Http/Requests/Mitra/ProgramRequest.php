<?php

namespace App\Http\Requests\Mitra;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProgramRequest extends FormRequest
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
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|min:5',
            'intern_type' => 'required',
            'work_mode' => 'required',
            'duration' => 'required',
            'start' => 'required',
            'end' => 'required',
            'description' => 'required|min:10',
        ];

        if ($this->isMethod('PATCH')) {
            $rules['guidebook'] = 'nullable';
        } else {
            $rules['guidebook'] = 'required';
        }

        return $rules;
    }

}
