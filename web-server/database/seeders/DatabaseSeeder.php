<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Contracts\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        $this->call(RoleSeeder::class);

        \App\Models\User::factory(10)->create()->each(function ($user) {
            $user->assignRole('user');
        });
        // $this->call(UserSeeder::class);


        $this->call([
            ProductSeeder::class,
            OrderSeeder::class,
        ]);
    }
}
