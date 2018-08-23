<?php

use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        App\Setting::create([
             'site_name' => "Laravel\'s Blog",
             'contact_number' => '+234 890 789 2567',
             'contact_email'  => 'laravel@ng.com',
             'address'  => 'Lagos, Nigeria'
        ]);
    }
}
