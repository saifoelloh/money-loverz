<?php

use App\User;
use App\Menu;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $min = 1;
        $max = 251;
        for ($i = 0; $i < $max; $i++) {
            User::create([
              'name' => $faker->name,
              'email' => $faker->unique()->safeEmail,
              'email_verified_at' => now(),
              'gender' => rand() % 2 ? 'male' : 'female',
              'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
              'remember_token' => Str::random(10),
              'role' => 'user',
              'address' => $faker->address,
              'phone' => $faker->phoneNumber
            ]);
        }
        $menu = [
          $faker->companySuffix,
          $faker->companySuffix,
          $faker->companySuffix,
          $faker->companySuffix,
          $faker->companySuffix,
          $faker->companySuffix,
        ];
        for ($i = 0; $i < 89; $i++) {
          Menu::create([
            'name' => $faker->firstNameFemale,
            'description' => $faker->jobTitle,
            'price' => rand(18000, 30000),
            'category' => $menu[rand(0, sizeof($menu)-1)],
            'photo' => '',
            'user_id' => rand($min, $max)
          ]);
        }
    }
}
