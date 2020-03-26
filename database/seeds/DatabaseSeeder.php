<?php

use App\User;
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
        /* $this->call([UsersTableSeeder::class]); */
        for ($i = 0; $i < 1000; $i++) {
            User::create([
              'name' => $faker->name,
              'email' => $faker->unique()->safeEmail,
              'email_verified_at' => now(),
              'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
              'remember_token' => Str::random(10),
              'role' => 'user',
              'address' => $faker->address,
              'phone' => $faker->phoneNumber
            ]);
        }
    }
}
