<?php

use Illuminate\Database\Seeder;

class ProducersSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('sellers')->insert([

        	['name' => 'Musica',
        	 'email' => 'musica@example.com',
        	 'password' => bcrypt('secret'),
        	 'estatus' => 'Aprobado',
        	 'ruc_s' => 'Musica',
        	 'descs_s' => 'Musica',
        		],
        	['name' => 'Peliculas',
        	 'email' => 'peliculas@example.com',
        	 'password' => bcrypt('secret'),
        	 'estatus' => 'Aprobado',
        	 'ruc_s' => 'Musica',
        	 'descs_s' => 'Musica',
        		],

        	['name' => 'Series',
        	 'email' => 'series@example.com',
        	 'password' => bcrypt('secret'),
        	 'estatus' => 'Aprobado',
        	 'ruc_s' => 'Series',
        	 'descs_s' => 'Series',
        		],
        	 ['name' => 'Tv',
        	 'email' => 'tv@example.com',
        	 'password' => bcrypt('secret'),
        	 'estatus' => 'Aprobado',
        	 'ruc_s' => 'Tv',
        	 'descs_s' => 'Tv',
        		],
        	['name' => 'Radio',
        	 'email' => 'radio@example.com',
        	 'password' => bcrypt('secret'),
        	 'estatus' => 'Aprobado',
        	 'ruc_s' => 'Radio',
        	 'descs_s' => 'Radio',
        		],
        	['name' => 'Libros',
        	 'email' => 'libros@example.com',
        	 'password' => bcrypt('secret'),
        	 'estatus' => 'Aprobado',
        	 'ruc_s' => 'Libros',
        	 'descs_s' => 'Libros',
        		]
        	
       ]);
    }
}
