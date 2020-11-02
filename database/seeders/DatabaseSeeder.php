<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
                'name'=>'Edward Munoz',
                'email' => 'emunozhern@gmail.com',
                // 'parent_id' => 0,
                // 'upline_id' => 0,
                'level' => 1,
                'sameline' => 1,
                'path'=>'0',
                'password' => bcrypt('admin'),
            ]);
    }
}