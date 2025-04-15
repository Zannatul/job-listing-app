<?php

namespace App\Services\Interfaces;

interface JobApplicationServiceInterface
{
    public function applyToJob($jobId, array $data);
}
