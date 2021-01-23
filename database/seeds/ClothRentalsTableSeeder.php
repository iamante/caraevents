<?php

use App\ClothRental;
use Illuminate\Database\Seeder;

class ClothRentalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ClothRental::create([
            'name' => 'Viollete',
            'slug' => 'violet-gown',
            'color' => 'Violet',
            'details' => 'Gown.',
            'availability' => '12',
            'price' => '1,000',
            'description' => 'Kendall Gown Elegant Midi Evening Dresses as Elegant Evening Wear Dress Code amid Elegant Evening Gown Fashion into Fashion Dress Design Picture.',
        ]);

        ClothRental::create([
            'name' => 'Blazer',
            'slug' => 'barong-tagalog',
            'color' => 'White',
            'details' => 'Barong',
            'availability' => '26',
            'price' => '6500',
            'description' => 'Filipino Wedding Barong Tagalog Long sleeve',
        ]);

        ClothRental::create([
            'name' => 'Coat',
            'slug' => 'coat',
            'color' => 'Violet , Black',
            'details' => 'Coat',
            'availability' => '9',
            'price' => '1,000',
            'description' => 'Coat for rent',
        ]);
    }
}
