<?php

use Illuminate\Database\Seeder;
use App\Language;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Language::create([
            'title' => 'EN',
            'slogan' => 'English Language',
            'img' => '1568464820.png',
            'created_at' => date( 'Y-m-d h:i:s' ),
            'updated_at' => date( 'Y-m-d h:i:s' )
        ]);
    }
}
