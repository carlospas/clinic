<?php
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1,10) as $index) {
            DB::table('users')->insert([
                'name'=>$faker->name,
                'username'=>$faker->word,
                'slug'=>$faker->word,
                'email'=>$faker->email,
                'address'=>$faker->address,
                'phone'=>$faker->phoneNumber,
                'password' => bcrypt('secret'),


            ]);
        }
    }
}
