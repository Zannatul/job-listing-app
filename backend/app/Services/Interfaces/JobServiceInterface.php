<?php

namespace App\Services\Interfaces;

interface JobServiceInterface
{
    public function getAllJobs();
    public function getJobWithViewCount($id);
}