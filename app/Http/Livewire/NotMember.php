<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class NotMember extends Component
{

    public function render()
    {
        return view('livewire.not_member');
    }
}
