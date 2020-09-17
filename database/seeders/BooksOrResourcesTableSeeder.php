<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BooksOrResourcesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\BookOrResource::factory()->count(30)->create(); 
    }
}
