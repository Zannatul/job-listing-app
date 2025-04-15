<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Interfaces\JobServiceInterface;

class JobController extends Controller
{
    protected $jobService;

    public function __construct(JobServiceInterface $jobService)
    {
        $this->jobService = $jobService;
    }

    public function index()
    {
        return response()->json($this->jobService->getAllJobs());
    }

    public function show($id)
    {
        return response()->json($this->jobService->getJobWithViewCount($id));
    }
}
