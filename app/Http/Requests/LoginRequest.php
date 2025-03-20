<?php

namespace App\Http\Requests;

use App\Models\Moderator;
use Exception;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'email' => ['required', 'email', 'max:100'],
            'password' => ['required', 'string', 'max:50'],
        ];
    }
    public function authentication(): void
    {
        $user = Moderator::where(['email' => $this->email])->first();
        if (!$user || (!Hash::check($this->password, $user?->password))) {
            throw new Exception('Invalid email or password');
        }
        if ($user->status === 0) {
            throw new Exception('Your account is not active.');
        }
        Auth::guard('moderator')->login($user);
    }
}
