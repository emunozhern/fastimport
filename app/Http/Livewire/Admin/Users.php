<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Laravel\Fortify\Rules\Password;
use Illuminate\Support\Facades\Hash;
use App\Actions\Fortify\PasswordValidationRules;

class Users extends Component
{
    use WithPagination;

    protected $queryString = [
        'q'=> ['except'=>''],
        'perPage'=> ['except'=>'10'],
    ];
    
    public $q;
    public $perPage = '10';
    public $showEdit = false;
    public $title = 'Usuarios';
    public $user_id;

    public $name;
    public $email;
    public $password;
    public $dni_photo_url_one;
    public $dni_photo_url_two;

    public function render()
    {
        return view('livewire.admin.users', [
            'users' => User::where('is_approved', true)
            ->where('name', 'LIKE', "%{$this->q}%")
            // ->orWhere('email', 'LIKE', "%{$this->q}%")
            ->paginate($this->perPage),
        ])
        ->layout('layouts.admin');
    }

    public function clear()
    {
        $this->page = 1;
        $this->perPage = '10';
        $this->q = "";
    }
    
    public function userStatus(User $user)
    {
        $user->update(['is_active' => !$user->is_active]);
    }
    
    public function userAdmin(User $user)
    {
        $user->update(['is_admin' => !$user->is_admin]);
    }

    public function edit(User $user)
    {
        $this->showEdit = !$this->showEdit;

        $this->title = 'Usuarios';

        if ($this->showEdit) {
            $this->user_id = $user->id;

            $this->title = "Editar $user->name";
            $this->name = $user->name;
            $this->email = $user->email;
            $this->dni_photo_url_one = $user->dni_photo_url_one;
            $this->dni_photo_url_two = $user->dni_photo_url_two;
        }
    }

    public function submit(User $user)
    {
        $validatedData = $this->validate([
            'name' => 'required|min:6',
            'email' => 'required|email',
            'password' => ['nullable','string', new Password]
        ]);
        
        
        if ($validatedData['password']) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        } else {
            unset($validatedData['password']);
        }

        $user->update($validatedData);
  
        return redirect()->route('admin.users');
    }
}