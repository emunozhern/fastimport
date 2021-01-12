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
        $parent_id = User::all()->random()->id;
        // $matrix = $this->checkMatrix([$parent_id]);

        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => bcrypt('admin'), // password
            'remember_token' => Str::random(10),
            'parent_id' => $parent_id,
            // 'upline_id' => $matrix['upline_id'],
            // 'level' => $matrix['level'],
            // 'path' => $matrix['path'],
            // 'sameline' => $matrix['sameline'],
        ];
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
}