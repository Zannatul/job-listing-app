<?php

namespace App\Repositories;

use App\Models\JobPost as Job;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Request;

class JobRepository implements Interfaces\JobRepositoryInterface
{
    public function all()
    {
        return Job::withCount('applications')->get();
    }

    public function find($id)
    {
        return Job::withCount('applications')->findOrFail($id);
    }

    public function incrementViews($id)
    {
        $key = 'job_viewed_' . $id . '_' . Request::ip();

        if (!Cache::has($key)) {
            Job::where('id', $id)->increment('view_count');
            Cache::put($key, true, 60); // prevent multiple views for 60 minutes
        }
    }
}
