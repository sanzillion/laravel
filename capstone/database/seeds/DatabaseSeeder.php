<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
        	'name' => 'master',
        	'phone_number' => '639074239571',
        	'email' => 'master@dev.com',
        	'level' => 'superuser',
        	'password' => bcrypt("master")
        ]);
    }
}
