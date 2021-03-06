<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomLoginController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        if (Auth::check()) {
            if (!Auth::user()->is_approved) {
                return redirect()->route('not_member');
            }
            return redirect()->route('dashboard');
        } else {
            return view('auth.login');
        }
    }
}
