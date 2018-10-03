<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'parent_referral_id' => '1111111111',
            'title' => 'English',
            'localization' => 'en-US',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
    }
}
