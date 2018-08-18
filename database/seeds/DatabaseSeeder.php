<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(sellers_modules_seeder::class);
        $this->call(TagsSeeder::class);
        $this->call(ProducersSeed::class);
        $this->call(PromoterModules::class);
        $this->call(Rating::class);
        $this->call(TicketSeeder::class);

    }
}
