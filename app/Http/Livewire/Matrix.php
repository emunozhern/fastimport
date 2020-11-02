<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Matrix extends Component
{
    public function render()
    {
        $users = User::where('path', 'LIKE', Auth::user()->path . '%');
        if (Auth::user()->path!=0) {
            $users =  $users->where('upline_id', '>', Auth::user()->upline_id);
        }
        
        $users =  $users->get();
        
        if (Auth::user()->path!=0) {
            $users_2 = User::where('path', '=', Auth::user()->path)
            ->get();
            
            $users = $users->merge($users_2);
        }

        $i = 0;
        foreach ($users as $user) {
            $data[$i]['id'] = $user->id;
            $data[$i]['name'] = $user->name;
            $data[$i]['email'] = $user->email;
            $data[$i]['profile_photo_url'] = $user->profile_photo_url;
            $data[$i]=collect($data[$i]);
            $data[$i++]['parent'] = ($user['upline_id']==Auth::user()->upline_id ? "": $user['upline_id']);
        }
        $data = collect($data);
        
        
        return view('livewire.matrix', [
            'data' => $data,
        ]);
    }
}