<?php

use App\Product;
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
        // $this->call(UserSeeder::class);
        $this->call(PermissionInfoSeeder::class);
        $this->call(CategoriasSeeder::class);

        $products = factory(Product::class, 15)->create();
    }
}
