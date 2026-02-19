<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // TODO: Modify to check authenticated
        // TODO: Modify to check authorised / own the contact
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'given_name' => [
                'required',
                'string',
                'max:255'
            ],
            'family_name' => [
                'nullable',
                'string',
                'max:255'
            ],
            'nickname' => [
                'nullable',
                'string',
                'max:255'
            ],
            'title' => [
                'nullable',
                'string',
                'max:255'
            ],
        ];
    }
}
