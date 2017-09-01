<?php

use Illuminate\Database\Seeder;

class InterfaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory(App\Inter::class, 1)->create();
        DB::table('interfaces')
        ->insert([
          'name' => 'GPIO',
          'quantity' => 2,
          'node_id' => 2,
        ]);
        DB::table('interfaces')
        ->insert([
          'name' => 'UART',
          'quantity' => 2,
          'node_id' => 2,
        ]);
    }
}
