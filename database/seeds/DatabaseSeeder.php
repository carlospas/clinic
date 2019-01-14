<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       Eloquent::unguard();
      //disable foreign key check for this connection before running seeders
      DB::statement('SET FOREIGN_KEY_CHECKS=0;');
//       $this->call(UsersTableSeeder::class);
     $this->call(PermissionTableSeeder::class);
       $this->call(HistoryTableSeeder::class);
       $this->call(ImmunizationTableSeeder::class);
       $this->call(AddDummyEvent::class);
       DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
