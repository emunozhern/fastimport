<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    // public function dashboard()
    // {
    //     return view('dashboard');
    // }
    
    public function matrix(Request $request)
    {
        $users=User::where('path', 'LIKE', Auth::user()->path . '%')->get();

        $user_array=$users->toArray();
        $i = 0;
        foreach ($user_array as $user) {
            $data[$i]['id'] = $user['id'];
            $data[$i]['name'] = $user['name'];
            $data[$i]['email'] = $user['email'];
            $data[$i++]['parent'] = ($user['upline_id']==Auth::user()->upline_id ? "": $user['upline_id']);
        }
        // dump($data);
        return view('matrix');
    }
    
    public function matrix_get_user(Request $request)
    {
        $users=User::where('path', 'LIKE', Auth::user()->path . '%')->get();

        $user_array=$users->toArray();
        $i = 0;
        foreach ($user_array as $user) {
            $data[$i]['id'] = $user['id'];
            $data[$i]['name'] = $user['id'];
            $data[$i]['email'] = $user['email'];
            $data[$i++]['parent'] = ($user['upline_id']==Auth::user()->upline_id ? "": $user['upline_id']);
        }
        // dump($data);
        return response()->json(['data'=>$data], 200);
    }
}