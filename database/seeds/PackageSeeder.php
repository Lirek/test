<?php

use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tickets_package')->insert([

        	['amount' => 15,
        	 'name' => 'Paquete Basico',
        	 'points' => 3,
        	 'cost' => 10,
        	 'points_cost' => 20,
        		]]);
    }
}
