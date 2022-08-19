<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;

class NotebookRequest extends FormRequest
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
            'full_name' => 'required',
            'company' => 'nullable',
            'phone' => 'required|regex:/^(\+7)[0-9]{10}$/',
            'email' => 'required|email',
            'birthday' => 'nullable',
            'photo' => 'nullable|url',
        ];
    }
}
