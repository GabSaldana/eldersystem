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
        $this->call(UserSeeder::class);
        //$this->call(AdminSeeder::class);
        //$this->call(NodeSeeder::class);
        //$this->call(InterfaceSeeder::class);
        //$this->call(VariableSeeder::class);
        //$this->call(NotificationSeeder::class);
        //$this->call(intervarSeeder::class);
        //$this->call(MeasureSeeder::class);
    }
}
