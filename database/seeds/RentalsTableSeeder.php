<?php

use App\Rental;
use Illuminate\Database\Seeder;

class RentalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rental::create([
            'name' => 'Hyundai Accent 2019',
            'slug' => 'car-hyundai',
            'details' => 'White Automatic Car',
            'price' => '4500',
            'description' => 'Unlimited Hour with 3 Stations only :   dressing  church    reception',
        ]);

        Rental::create([
            'name' => 'Wedding Service Van',
            'slug' => 'van',
            'details' => 'White Van',
            'price' => '6500',
            'description' => 'Unlimited Hour with 3 Stations only :   dressing  church    reception',
        ]);
    }
}
