<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\Round;
use App\Models\Question;
use Illuminate\Support\Facades\Hash;
use Database\Seeders\AdminSeeder; // Import AdminSeeder
use Database\Seeders\RoundSeeder; // Import RoundSeeder
use Database\Seeders\QuestionSeeder; // Import QuestionSeeder

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Seed Admin
        $this->call(AdminSeeder::class);

        // Seed Round
        $this->call(RoundSeeder::class);

        // Seed Questions
        $this->call(QuestionSeeder::class);
    }
}