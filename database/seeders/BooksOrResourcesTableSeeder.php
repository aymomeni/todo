<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TodosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\BooksOrResources::factory()->count(30)->create(); 
    }
}
