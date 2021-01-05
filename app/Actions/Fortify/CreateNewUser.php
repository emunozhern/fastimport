<?php

namespace App\Actions\Fortify;

use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'parent_id' => ['required', 'integer', 'exists:users,id'],
            'password' => $this->passwordRules(),
        ])->validate();

        
        return DB::transaction(function () use ($input) {
            $matrix = $this->checkMatrix([$input['parent_id']]);
            
            return tap(User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
                'parent_id' => $input['parent_id'],
                'upline_id' => $matrix['upline_id'],
                'level' => $matrix['level'],
                'path' => $matrix['path'],
                'sameline' => $matrix['sameline'],
                ]), function (User $user) {
                    $this->createTeam($user);
                });
        });
    }

    public function checkMatrix($upline_ids=[1])
    {
        $next_upliners = [];
        foreach ($upline_ids as $key => $upline_id) {
            dump("Buscando posición upline: {$upline_id}");
            
            $upline = User::where('id', $upline_id)->first();
            
            $level = $upline->level;
            $sameline = $upline->children->count()+1;
            
            dump("El upline tiene: {$upline->children->count()} hijos");
            if ($upline->children->count() < 10) {
                return [
                    'path' => User::where('id', $upline_id)->first()->path . $sameline,
                    'sameline' => $sameline,
                    'upline_id' => $upline_id,
                    'level' => $level + 1,
                ];
            }

            dump(" El upliners {$upline_id} tiene el máximo de {$upline->children->count()}");
            $upliners = $upline->children->pluck('id')->toArray();
            $next_upliners = array_merge($next_upliners, $upliners);
        }
      
        return $this->checkMatrix($next_upliners);
    }

    /**
     * Create a personal team for the user.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    protected function createTeam(User $user)
    {
        $user->ownedTeams()->save(Team::forceCreate([
            'user_id' => $user->id,
            'name' => explode(' ', $user->name, 2)[0]."'s Team",
            'personal_team' => true,
        ]));
    }
}