<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $parent_ids = User::pluck('id')->toArray();
        
        $matrix_forced = $this->checkMatrixForced();
        
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => bcrypt('admin'), // password
            'remember_token' => Str::random(10),
            'parent_id' => $parent_ids[array_rand($parent_ids, 1)],
            'upline_id' => $matrix_forced['upline_id'],
            'level' => $matrix_forced['level'],
            'path' => $matrix_forced['path'],
            'sameline' => $matrix_forced['sameline'],
        ];
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
}