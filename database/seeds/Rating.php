<?php

use Illuminate\Database\Seeder;

class Rating extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('rating')->insert([

        	['r_name' => 'TP',
        	 'r_descr' => 'Todo Publico',
                ],
                
            ['r_name' => '12 años',
            'r_descr' => 'Mayores de 12 años',
                   ],       
            ['r_name' => '15 años',
             'r_descr' => 'Mayores de 15 años',
                      ],
            ['r_name' => '18 años',
             'r_descr' => 'Mayores de 18 años',
                      ]
       ]);
    }
}
