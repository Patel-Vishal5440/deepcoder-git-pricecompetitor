<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProfileRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'image' => ['image', 'file', 'max:10240'],
            'name' => ['required', 'max:100', 'string'],
            'email' => ['required', 'email', 'max:100', 'unique:moderators,email,' . Auth()->user()->id . ',id'],
        ];
    }
    public function messages(): array
    {
        return [
            'image.max' => 'Profile size should be less than 10MB'
        ];
    }
}
