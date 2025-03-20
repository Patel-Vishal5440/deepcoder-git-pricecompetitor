<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'currentPassword' => ['required'],
            'password' =>['required'],
            'confirmPassword' => ['required', 'same:password'],
        ];
    }
}
