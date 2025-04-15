<?php

namespace App\Services;

use App\Http\Resources\JobResource;
use App\Repositories\Interfaces\JobRepositoryInterface;

class JobService implements Interfaces\JobServiceInterface
{
    protected $jobRepo;

    public function __construct(JobRepositoryInterface $jobRepo)
    {
        $this->jobRepo = $jobRepo;
    }

    public function getAllJobs()
    {
        return JobResource::collection($this->jobRepo->all());
    }

    public function getJobWithViewCount($id)
    {
        $this->jobRepo->incrementViews($id);
        return new JobResource($this->jobRepo->find($id));
    }
}
