<?php

namespace App\Services;

use App\Repositories\Interfaces\JobApplicationRepositoryInterface;
use App\Models\Job;
use Illuminate\Support\Facades\Mail;
use App\Mail\JobApplicationReceived;

class JobApplicationService implements Interfaces\JobApplicationServiceInterface
{
    protected $repo;

    public function __construct(JobApplicationRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    public function applyToJob($jobId, array $data)
    {
        // $application = $this->repo->create($jobId, $data);

        // $job = Job::findOrFail($jobId);

        // // Dispatch job with queue
        // Mail::to('company@example.com')->queue(new JobApplicationReceived($job, $application));

        // return $application;
    }
}
