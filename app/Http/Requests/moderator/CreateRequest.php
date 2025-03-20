<?php

namespace App\Http\Requests\moderator;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    public function rules(): array
    {
        $data =  [
            'profileImage' => ['nullable', 'file', 'image', 'max:10240'],
            'name' => ['required', 'max:100'],
        ];
        
        $data['password'] = !isset($this->id) ? ['required', 'max:100'] : ['nullable', 'max:100'];
        $data['email'] = !isset($this->id) ? ['required', 'email', 'unique:moderators,email', 'email:filter', 'max:100']  : ['required', 'email', 'max:100'];

        return $data;
    }
    public function messages(): array
    {
        return [
            'profileImage.max' => 'Profile size should be less than 10MB',
        ];
    }
}
