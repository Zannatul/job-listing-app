<?php

namespace App\Repositories;

use App\Models\Application;
use App\Models\JobApplication;

class JobApplicationRepository implements Interfaces\JobApplicationRepositoryInterface
{
    public function create($jobId, array $data)
    {
        return Application::create([
            'job_id' => $jobId,
            'name' => $data['name'],
            'email' => $data['email'],
        ]);
    }
}
