<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPost extends Model
{
    /** @use HasFactory<\Database\Factories\JobPostFactory> */
    use HasFactory;
    protected $fillable = ['title', 'company_name', 'description', 'views'];
    public function applications()
    {
        return $this->hasMany(\App\Models\Application::class, 'job_id');
    }
}
