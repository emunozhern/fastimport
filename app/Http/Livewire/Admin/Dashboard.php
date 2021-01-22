<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.admin.dashboard', [
            'users_count' => User::where('id', '<>', 1)->where('is_approved', false)
            ->count(),
            'users_approved' => User::where('id', '<>', 1)->where('is_approved', true)
            ->count(),
            'network_level' => User::where('is_approved', true)->orderBy('id', 'DESC')->first()
        ])
        ->layout('layouts.admin');
    }
}