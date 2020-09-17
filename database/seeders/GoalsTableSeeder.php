<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GoalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Goal::factory()->count(30)->create(); 
    }
}
