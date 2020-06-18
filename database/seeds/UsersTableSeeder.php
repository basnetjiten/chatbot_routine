<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
            'username' => 'gunjandigital',
            'email' => 'gunjandigital@gmail.com',
            'password' => bcrypt('123Yougofree'),
            'type' => 'admin',
            'bio' => '',
            'photo' => '',
            // 'password' => Hash::make($request['password']),
            'token' => Str::orderedUuid(),
        ]);
        DB::table('streamers')->insert([
            'alert_link' => Str::orderedUuid(),
            'user_id' => 1,
            'status' => 'registered'

        ]);

    }

}
