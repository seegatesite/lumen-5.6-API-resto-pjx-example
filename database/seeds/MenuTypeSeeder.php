<?php

use Illuminate\Database\Seeder;

class MenuTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('m_menu_type')->insert([
            'type_name' => 'FOOD'
        ]);
        DB::table('m_menu_type')->insert([
            'type_name' => 'DRINK'
        ]);
    }
}
