<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AnimalCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('animal_categories')->insert([
        [
          'name' => 'Cat',
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now(),
        ],
        [
          'name' => 'Dog',
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now(),
        ],
        [
          'name' => 'Bird',
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now(),
        ],
        [
          'name' => 'Insect',
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now(),
        ],
        [
          'name' => 'Other',
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now(),
        ],
      ]);
    }
}
