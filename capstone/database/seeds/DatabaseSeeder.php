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

        $sender = "SOSnetwork App";

        $data = array(
            array('sender'=>$sender, 
                    'recipient'=>'All', 
                    'body'=>'Hi Everyone! This is a test message!',
                    'code'=>100),
            array('sender'=>$sender, 
                    'recipient'=>'Admins', 
                    'body'=>'Hi Admins! This is a test message!',
                    'code'=>200),
            array('sender'=>$sender, 
                    'recipient'=>'Users', 
                    'body'=>'Hi Users! This is a test message!',
                    'code'=>300)
        );

        DB::table('sms')->insert($data);
    }
}
