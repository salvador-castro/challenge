<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UserTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(GamblingTableSeeder::class);
        $this->call(SeederCon2Articulos::class); // Línea añadida
        // \App\Models\User::factory(10)->create();

        $this->call(ProductosSeeder::class);
    }
}
