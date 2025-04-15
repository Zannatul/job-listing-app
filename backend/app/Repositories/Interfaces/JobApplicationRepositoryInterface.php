<?php

namespace App\Repositories\Interfaces;

interface JobApplicationRepositoryInterface
{
    public function hasApplied(int $jobId, string $email): bool;
    public function create(int $jobId, array $data);
}
