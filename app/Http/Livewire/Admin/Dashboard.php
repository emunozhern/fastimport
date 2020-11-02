<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.admin.dashboard', [
            'users_count' => User::where('id', '<>', 1)
            ->count(),
            'network_level' => User::orderBy('id', 'DESC')->first()
        ])
        ->layout('layouts.admin');
    }
}