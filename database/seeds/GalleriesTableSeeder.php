<?php

use App\Gallery;
use Illuminate\Database\Seeder;

class GalleriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gallery::create([
                'name' => 'Birthday',
                'slug' => 'birthday',
        ])->categories()->attach(1);
        
        

        Gallery::create([
                'name' => 'Catering Wedding',
                'slug' => 'catering',
        ])->categories()->attach(2);

        Gallery::create([
            'name' => 'Bachelor',
            'slug' => 'bachelor',
            ])->categories()->attach(3);
    }
}
