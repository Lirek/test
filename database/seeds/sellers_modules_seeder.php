<?php

use Illuminate\Database\Seeder;

class sellers_modules_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('sellers_modules')->insert([
        	['name' => 'Musica',],
        	['name'=> 'Peliculas'],
        	['name'=> 'Libros'],
        	['name'=> 'Series'],
        	['name'=> 'Revistas'],
        	['name'=> 'Radios'],
        	['name'=> 'TV']
       ]);
    }
}
