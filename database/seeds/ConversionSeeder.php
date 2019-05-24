<?php

use Illuminate\Database\Seeder;

class ConversionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('conversion')->insert([
    		[
    			'tipo' => 'punto',
    			'costo' => '0.1785',
    			'desde' => date('Y-m-d'),
    		],
    		[
    			'tipo' => 'ticket',
    			'costo' => '0.1785',
    			'desde' => date('Y-m-d'),
    		]
        ]);
    }
}
