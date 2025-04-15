<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\JobApplicationRequest;
use App\Services\Interfaces\JobApplicationServiceInterface;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\JobApplicationRepositoryInterface;

class JobApplicationController extends Controller
{
    protected $service;
    protected $repo;

    public function __construct(
        JobApplicationServiceInterface $service,
        JobApplicationRepositoryInterface $repo
    ) {
        $this->service = $service;
        $this->repo = $repo;
    }

    public function apply(JobApplicationRequest $request, $jobId)
    {

        if ($this->repo->hasApplied($jobId, $request->email)) {
            return response()->json(['message' => 'You have already applied for this job.'], 409);
        }

        $application = $this->service->applyToJob($jobId, $request->all());

        return response()->json([
            'message' => 'Application submitted successfully.',
            'application' => $application
        ], 200);
    }
}
