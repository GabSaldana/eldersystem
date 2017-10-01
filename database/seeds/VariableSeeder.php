<?php

use Illuminate\Database\Seeder;

class VariableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory(App\Variable::class, 1)->create();
        DB::table('variables')
        ->insert([
          'name' => 'Temperatura',
          'range' => '35.0-38.0',
        ]);
        DB::table('variables')
        ->insert([
          'name' => 'Pulso cardiaco',
          'range' => '60-100',
        ]);
    }
}
