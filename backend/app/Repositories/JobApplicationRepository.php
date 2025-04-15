<?php

namespace App\Repositories;

use App\Models\Application;

class JobApplicationRepository implements Interfaces\JobApplicationRepositoryInterface
{
    public function hasApplied(int $jobId, string $email): bool
    {
        return Application::where('job_id', $jobId)->where('email', $email)->exists();
    }

    public function create(int $jobId, array $data)
    {
        try {
            return Application::create([
                'job_id' => $jobId,
                'name' => $data['name'],
                'email' => $data['email'],
            ]);
        } catch (\Exception $e) {
            \Log::error('Error creating application: ' . $e->getMessage());
            return null;
        }
    }
}
