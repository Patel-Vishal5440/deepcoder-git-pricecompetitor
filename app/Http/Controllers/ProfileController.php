<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordUpdateRequest;
use App\Http\Requests\ProfileRequest;
use App\Repositories\ProfileRepository;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Profiler\Profile;

class ProfileController extends Controller
{
    protected $repo;

    public function __construct(ProfileRepository $profileRepository)
    {
        $this->repo = $profileRepository;
    }

    public function index()
    {
        return view('profile', ['title' => 'Update Profile', 'admin' => Auth()->user()]);
    }

    public function updateProfile(ProfileRequest $profileRequest)
    {
        return redirect()->route('admin.profile.index');
    }

    public function changePassword()
    {
        return view('change-password', ['title' => 'Change Password']);
    }

    public function updatePassword(PasswordupdateRequest $request)
    {
        if ($this->repo->updatePassword($request)) {
            return redirect()->route('admin.wholesale-order');
        }
        return redirect()->route('admin.profile.change-password');
    }
}
