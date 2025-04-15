<?php

namespace App\Services;

use App\Repositories\Interfaces\JobApplicationRepositoryInterface;
use App\Models\JobPost;
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
        $application = $this->repo->create($jobId, $data);
        $job = JobPost::findOrFail($jobId);

        try {
            Mail::to($job->company_email)->queue(new JobApplicationReceived($job, $application));
        } catch (\Throwable $e) {
            \Log::error("Failed to queue email: " . $e->getMessage());
        }

        return $application;
    }
}
