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
        ////以下を追加します。
        DB::table('users')->insert([
            'username' => 'join',
            'mail' => 'join@icloud',
            'password' => bcrypt('joun0824'),
            'images' => 'joinは楽しいです',
        ]);
        DB::table('users')->insert([
            'username' => 'smail',
            'mail' => 'smail@gmail.com',
            'password' => bcrypt('you2456'),
            'images' => '元気です',
        ]);
        
    }
}
