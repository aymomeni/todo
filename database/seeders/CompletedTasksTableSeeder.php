<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CompletedTasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\CompletedTask::factory()->count(30)->create(); 
    }
}