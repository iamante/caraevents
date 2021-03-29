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
        $this->call(CategoryTableSeeder::class);
        $this->call(CategoryImageTableSeeder::class);
        $this->call(ServicesTableSeeder::class);
        $this->call(GalleriesTableSeeder::class);
        $this->call(RentalsTableSeeder::class);
        $this->call(ClothRentalsTableSeeder::class);
        $this->call(LocationTableSeeder::class);
        // $this->call(VenueTableSeeder::class);
    }
}
