<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserPending extends Component
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

    public function render()
    {
        return view('livewire.admin.user-pending', [
            'users' => User::where('is_approved', false)
            ->where('name', 'LIKE', "%{$this->q}%")
            ->paginate($this->perPage),
        ])
        ->layout('layouts.admin');
    }
    public function userStatus(User $user)
    {
        $matrix = $this->checkMatrix([$user->parent_id]);
        if ($matrix ) {
            $user->update([
                'is_approved' => true,
                'upline_id' => $matrix['upline_id'],
                'level' => $matrix['level'],
                'path' => $matrix['path'],
                'sameline' => $matrix['sameline'],
            ]);
        }
    }

    public function checkMatrix($upline_ids=[1])
    {
        $next_upliners = [];
        foreach ($upline_ids as $key => $upline_id) {
            // dump("Buscando posición upline: {$upline_id}");

            $upline = User::where('is_approved', true)->where('id', $upline_id)->first();
            
            if (!$upline) {
                if ($key==count($next_upliners)) {
                    return [];
                }

                continue;
            }
            
            $level = $upline->level;
            $sameline = $upline->children->count()+1;

            // dump("El upline tiene: {$upline->children->count()} hijos");
            if ($upline->children->count() < 10) {
                return [
                    'path' => User::where('id', $upline_id)->first()->path . $sameline,
                    'sameline' => $sameline,
                    'upline_id' => $upline_id,
                    'level' => $level + 1,
                ];
            }

            // dump(" El upliners {$upline_id} tiene el máximo de {$upline->children->count()}");
            $upliners = $upline->children->pluck('id')->toArray();
            $next_upliners = array_merge($next_upliners, $upliners);
        }

        return $this->checkMatrix($next_upliners);
    }
}