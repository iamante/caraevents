<?php

use App\Location;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;

class LocationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();

        Location::insert([
            ['location' => 'Taytay','venue' => 'Paradiso Terrestre', 'created_at' => $now, 'updated_at' => $now],
            ['location' => 'Cavite City','venue' => 'Castillo Royale Ortigas Events Venue',  'created_at' => $now, 'updated_at' => $now],
            ['location' => 'Cainta','venue' => 'Venue Victoria', 'created_at' => $now, 'updated_at' => $now],
            ['location' => 'Antipolo','venue' => 'Marias Events Place', 'created_at' => $now, 'updated_at' => $now],
            ['location' => 'Caloocan City','venue' => 'Casa Gilmore Events Place', 'created_at' => $now, 'updated_at' => $now],
            ['location' => 'Mandaluyong City','venue' => 'Villa Ardin Events Place', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
