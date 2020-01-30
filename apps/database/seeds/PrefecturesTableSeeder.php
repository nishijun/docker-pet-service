<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PrefecturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $url = "https://api.gnavi.co.jp/master/PrefSearchAPI/v3/?keyid=931e74e4f914553ed6cd41a1fbbc29bd";
      $data = json_decode(file_get_contents($url));
      // dd($data->pref['0']->pref_name);
      for ($i = 0; $i <= 46; $i++) {
        DB::table('prefectures')->insert([
          'name' => $data->pref[$i]->pref_name,
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now(),
        ]);
      }
      DB::table('prefectures')->insert([
        'name' => 'Overseas',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ]);
    }
}
