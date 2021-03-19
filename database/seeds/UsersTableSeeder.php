<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Administrador del Sistema',
            'email' => 'admin@localhost.test',
            'email_verified_at' => now(),
            'password' => Hash::make('123456789'),
            'image' => 'default.png',
            'status' => 1,
            'kind' => 1,
            'remember_token' => Str::random(10),
            'created_at' => now()
        ]);
    }
}
