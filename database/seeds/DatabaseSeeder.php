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
        // $this->call(UsersTableSeeder::class);
        $this->call([
            UsersTableSeeder::class, // 呼び出すように追加
        ]);

        // 現在認証しているユーザーを取得
        $user = auth()->user();

       // 現在認証しているユーザーのIDを取得
        $id = auth()->id();
    }
}
