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
                    'body'=>'This is a test message for Everyone!',
                    'code'=>100),
            array('sender'=>$sender, 
                    'recipient'=>'Admins', 
                    'body'=>'This is a test message for Admins!',
                    'code'=>200),
            array('sender'=>$sender, 
                    'recipient'=>'Users', 
                    'body'=>'This is a test message for Users!',
                    'code'=>300)
        );

        DB::table('sms')->insert($data);

        $data2 = array(
            array('month'=>'January', 'visitor'=>10, 'm_log'=>5, 'a_log'=>5, 'apply'=>5, 'approve'=>5, 'download'=>5, 'uptime'=>10),
            array('month'=>'February', 'visitor'=>35, 'm_log'=>20, 'a_log'=>5, 'apply'=>5, 'approve'=>5, 'download'=>5, 'uptime'=>20),
            array('month'=>'March', 'visitor'=>23, 'm_log'=>15, 'a_log'=>5, 'apply'=>5, 'approve'=>5, 'download'=>5, 'uptime'=>25),
            array('month'=>'April', 'visitor'=>58, 'm_log'=>45, 'a_log'=>5, 'apply'=>5, 'approve'=>5, 'download'=>5, 'uptime'=>80),
            array('month'=>'May', 'visitor'=>65, 'm_log'=>39, 'a_log'=>5, 'apply'=>5, 'approve'=>5, 'download'=>5, 'uptime'=>67),
            array('month'=>'June', 'visitor'=>77, 'm_log'=>65, 'a_log'=>5, 'apply'=>5, 'approve'=>5, 'download'=>5, 'uptime'=>34),
            array('month'=>'July', 'visitor'=>43, 'm_log'=>23, 'a_log'=>5, 'apply'=>5, 'approve'=>5, 'download'=>5, 'uptime'=>54),
            array('month'=>'August', 'visitor'=>56, 'm_log'=>38, 'a_log'=>5, 'apply'=>5, 'approve'=>5, 'download'=>5, 'uptime'=>22),
            array('month'=>'Semptember', 'visitor'=>90, 'm_log'=>60, 'a_log'=>5, 'apply'=>5, 'approve'=>5, 'download'=>5, 'uptime'=>5),
            array('month'=>'October', 'visitor'=>83, 'm_log'=>45, 'a_log'=>5, 'apply'=>5, 'approve'=>5, 'download'=>5, 'uptime'=>90),
            array('month'=>'November', 'visitor'=>67, 'm_log'=>54, 'a_log'=>5, 'apply'=>5, 'approve'=>5, 'download'=>5, 'uptime'=>93),
            array('month'=>'December', 'visitor'=>74, 'm_log'=>66, 'a_log'=>5, 'apply'=>5, 'approve'=>5, 'download'=>5, 'uptime'=>77),
        );

        DB::table('stats')->insert($data2);
    }
}
