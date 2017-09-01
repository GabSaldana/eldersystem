<?php

use Illuminate\Database\Seeder;

class intervarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('inter_variable')
      ->insert([
        'inter_id' => 1,
        'variable_id' => 1,
      ]);
      DB::table('inter_variable')
      ->insert([
        'inter_id' => 2,
        'variable_id' => 2,
      ]);
    }
}
