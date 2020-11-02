<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomRegisterController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $parent_id=null)
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        } else {
            return view('auth.register', compact('parent_id'));
        }
    }
}