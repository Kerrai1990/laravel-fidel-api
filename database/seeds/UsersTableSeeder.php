<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('users')->insert([
            'name' => "Super Admin",
            'email' => "Kerrai1990@googlemail.com",
            'password' => bcrypt('secret'),
            'email_verified_at' => now(),
        ]);
    }
}
