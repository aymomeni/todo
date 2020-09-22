<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CompletedTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Completed::factory()->count(30)->create(); 
    }
}