<?php

use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('tickets_package')->insert([
        	['amount'=>'15',
        	'photo'=>NULL,
        	'cost'=>10,
        	'name'=>'Paquete basico'		
        	]
        	
       ]);
    }
}
