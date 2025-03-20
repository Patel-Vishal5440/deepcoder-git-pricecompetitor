<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class ProfileRepository
{
    public function updateProfile() {}

    public function updatePassword(Request $request)
    {
        $user = Auth()->user();
        if (Hash::check($request->currentPassword, $user->password)) {
            $user->update([
                'password' => bcrypt($request->currentPassword)
            ]);
            session()->flash('alert', ['message' => 'Password Updated Successfully', 'type' => 'success']);
            return true;
        }
        session()->flash('alert', ['message' => 'Provided Password is incorrect', 'type' => 'danger']);
        return false;
    }
}
