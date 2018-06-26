<?php

use Illuminate\Database\Seeder;

class PromoterModules extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('promoter_modules')->insert([
        	['name' => 'SuperAdmin','priority'=>'1'],
        	['name'=> 'Admin','priority'=>'2'],
        	['name'=> 'Operator','priority'=>'3'],
       ]);
    }
}
