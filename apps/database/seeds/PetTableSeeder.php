<?php

use Illuminate\Database\Seeder;
use App\Pet;

class PetTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Pet::class, 200)->create();
    }
}
