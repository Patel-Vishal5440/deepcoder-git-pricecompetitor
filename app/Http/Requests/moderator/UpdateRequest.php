<?php

namespace App\Http\Requests\moderator;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function rules(): array
    {
        $moderator = Auth()->user();
        return [
            'profileImage' => 'nullable|file|image|max:10240',
            'name' => 'required|max:100',
            'email' => 'required|email|max:100|unique:moderators,email,' . $moderator->id,
            'password' => 'nullable|max:100',
        ];
    }
    public function messages(): array
    {
        return [
            'profileImage.max' => 'Profile size should be less than 10MB',
        ];
    }
}
