<?php

namespace App\Repositories\Interfaces;

interface JobApplicationRepositoryInterface
{
    public function create($jobId, array $data);
}
