<?php

use App\CarRental;
use Illuminate\Database\Seeder;

class CarRentalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CarRental::create([
            'car_name' => 'A.Hyundai Accent 2019',
            'slug' => 'hyundai-accent',
            'transmission' => 'Automatic',
            'color' => 'White',
            'seats' => '4 seats',
            'description' => 'Lorem ipsum',
            'price' => '3500',
        ]);
    }
}
