<?php

use Carbon\Carbon;
use App\CategoryImage;
use Illuminate\Database\Seeder;

class CategoryImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();
        
        CategoryImage::insert([
            ['name' => 'Birthday', 'slug' => 'birthday', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Wedding', 'slug' => 'wedding', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Debut', 'slug' => 'debut', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
