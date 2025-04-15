<?php

namespace Database\Seeders;

use App\Models\JobPost;
use App\Models\Application;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JobPost::factory()->count(5)->create()->each(function ($job) {
            Application::factory()->count(3)->create([
                'job_id' => $job->id,
            ]);
        });
    }
}
