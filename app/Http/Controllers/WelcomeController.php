<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    public function index(Request $request, $parent_id=null)
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        } else {
            return view('welcome', compact('parent_id'));
        }
    }
}