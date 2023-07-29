<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function postLogin(Request $request){
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required',
        ]);

        if (Auth::guard('admin')->attempt($request->except('_token'))) {
            return redirect(RouteServiceProvider::ADMIN);
        }else {
            return back()->withErrors(['error' => __('Your email or password is incorrect!')]);
        }

    }
}
