<?php

use App\Venue;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;

class VenueTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();

        Venue::insert([
            ['name' => 'Castillo Royale Ortigas Events Venue', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Marias Events Place',  'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Casa Bella Events Place', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Paradiso Terrestre', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Villa Ardin Events Place', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Venue Victoria', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
