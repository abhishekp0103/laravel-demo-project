<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => str_random(10),
            'email' => str_random(10).'@test.com',
            'password' => bcrypt('test'),
            'is_approved' => 'Y',
            'is_admin' => 'Y',
            'created_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
