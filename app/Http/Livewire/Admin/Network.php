<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Network extends Component
{
    public $user_detail;
    
    public function mount(User $user_detail)
    {
        // $this->user_detail = $user_detail;
    }

    public function render()
    {
        $user_current = Auth::user();
        
        if ($this->user_detail) {
            $user_current = $this->user_detail;
        }

        $users = User::where('path', 'LIKE', $user_current->path . '%');
        
        if ($user_current->path!=0) {
            $users = $users->where('upline_id', '>', $user_current->upline_id);
        }

        $users =  $users->get();
        
        if ($user_current->path!=0) {
            $users_2 = User::where('path', '=', $user_current->path)
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
            $data[$i++]['parent'] = ($user['upline_id']==$user_current->upline_id ? "": $user['upline_id']);
        }
        $data = collect($data);
        
        return view('livewire.admin.network', [
            'data' => $data,
        ])
        ->layout('layouts.admin');
    }
}