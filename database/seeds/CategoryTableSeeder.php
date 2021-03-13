<?php

use App\Category;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();

        Category::insert([
            ['name' => 'Birthday', 'slug' => 'birthday', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Wedding', 'slug' => 'wedding', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Debut', 'slug' => 'debut', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Catering', 'slug' => 'catering', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Rings', 'slug' => 'rings', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Accessories', 'slug' => 'accessories', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
