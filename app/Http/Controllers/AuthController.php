<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('admin.auth.login', ['title' => 'Login']);
    }

    public function loginPost(LoginRequest $loginRequest)
    {
        try {
            $loginRequest->authentication();
            $loginRequest->session()->regenerate();
            session()->flash('alert', ['message' => 'Welcome back!', 'type' => 'success']);
           
            // Check if the user has the 'product' permission
            if (Auth::guard('moderator')->user()->hasAnyPermission('product')) {
                return redirect()->route('admin.product.index'); // Redirect to product route
            }

            if (Auth::guard('moderator')->user()->hasAnyPermission('competitor')) {
                return redirect()->route('admin.competitor.index'); // Redirect to product route
            }
            
            return redirect()->intended(route('admin.dashboard')); // Default redirect
            
        } catch (Exception $exception) {
            session()->flash('alert', ['message' => $exception->getMessage(), 'type' => 'danger']);
            return redirect()->back();
        }
    }

    public function logout(Request $request){
        Auth::guard('moderator')->logout();
        $request->session()->invalidate();
        return redirect()->route('admin.login');
    }

}
