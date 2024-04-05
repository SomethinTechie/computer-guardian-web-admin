<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShortcodeUpdateRequest extends FormRequest
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
            'type' => ['required', 'string'],
            'status' => ['required', 'string'],
            'code' => ['required', 'string'],
        ];
    }
}
