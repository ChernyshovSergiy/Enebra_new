<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder
{
    public function run() :void
    {
        DB::table('languages')->insert([
            'slug' => 'en',
            'title' => 'English',
            'localization' => 'en-US',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('languages')->insert([
            'slug' => 'ru',
            'title' => 'Русский',
            'localization' => 'ru-RU',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('languages')->insert([
            'slug' => 'uk',
            'title' => 'Український',
            'localization' => 'uk-UA',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
    }
}
