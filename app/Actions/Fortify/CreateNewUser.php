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
            $matrix_forced = $this->checkMatrixForced();
            
            return tap(User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
                'parent_id' => $input['parent_id'],
                'upline_id' => $matrix_forced['upline_id'],
                'level' => $matrix_forced['level'],
                'path' => $matrix_forced['path'],
                'sameline' => $matrix_forced['sameline'],
                ]), function (User $user) {
                    $this->createTeam($user);
                });
        });
    }

    public function checkMatrixForced($upline_ids=[0=>1])
    {
        $next_upliners = [];
        foreach ($upline_ids as $key => $upline_id) {
            dump("Buscando posición upline: {$upline_id}");
            $upliners = User::where('upline_id', $upline_id)->where('id', '!=', 1);
            
            $upline = User::where('id', $upline_id)->first();
            $level = $upline->level;
            $sameline = $upliners->count()+1;

            if ($upliners->count() < 10) {
                return [
                    'path' => User::where('id', $upline_id)->first()->path . $sameline,
                    'sameline' => $sameline,
                    'upline_id' => $upline_id,
                    'level' => $level + 1,
                ];
            }

            dump(" El upliners {$upline_id} tiene el máximo de {$upliners->count()}");
            $upliners = $upliners->get()->pluck('id')->toArray();
            $next_upliners = array_merge($next_upliners, $upliners);
        }
      
        return $this->checkMatrixForced($next_upliners);
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