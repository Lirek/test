<?php

use Illuminate\Database\Seeder;

class acces extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
           DB::table('seller_acces')->insert([
        	['sellers_id' => '1','modules_id'=> '1'],
        	['sellers_id' => '2','modules_id'=> '2'],
        	['sellers_id' => '6','modules_id'=> '3'],
        	['sellers_id' => '3','modules_id'=> '4'],
        	['sellers_id' => '7','modules_id'=> '5'],
        	['sellers_id' => '4','modules_id'=> '6'],
        	['sellers_id' => '5','modules_id'=> '7']
        	]);
    }
}
