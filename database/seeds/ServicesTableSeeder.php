<?php

use App\Service;
use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Service::create([
                'name' => 'Birthday',
                'slug' => 'b-day-package-',
                'details' => 'Package',
                'guests' => '30 persons for 3 table',
                'price' => '50000',
                'description' => 'lorem ipsul dolore asd kasd',
        ])->categories()->attach(1);
        
        

        Service::create([
                'name' => 'Catering Wedding',
                'slug' => 'catering-b',
                'details' => 'Package B',
                'guests' => '50 persons for 3 table',
                'price' => '65000',
                'description' => 'lorem ipsul dolore asd kasd',
        ])->categories()->attach(2);

        Service::create([
            'name' => 'Bachelor',
            'slug' => 'bachelor-a',
            'details' => 'Package A',
            'guests' => '30 persons for 3 table',
            'price' => '35000',
            'description' => 'lorem ipsul dolore asd kasd',
            ])->categories()->attach(3);

        Service::create([
            'name' => 'Bridal Shower',
            'slug' => 'bridalshower-c',
            'details' => 'Package C',
            'guests' => '70 persons for 3 table',
            'price' => '75000',
            'description' => 'lorem ipsul dolore asd kasd',
            ])->categories()->attach(4);

        Service::create([
            'name' => 'Civil Wedding',
            'slug' => 'civil-a',
            'details' => 'Package A',
            'guests' => '30 persons for 3 table',
            'price' => '50000',
            'description' => 'lorem ipsul dolore asd kasd',
            ])->categories()->attach(5);
        
        Service::create([
            'name' => 'Civil Wedding (B)',
            'slug' => 'civil-b',
            'details' => 'Package B',
            'guests' => '50 persons for 3 table',
            'price' => '65000',
            'description' => 'lorem ipsul dolore asd kasd',
            ])->categories()->attach(5);
    }
}
