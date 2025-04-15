<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    /** @use HasFactory<\Database\Factories\ApplicationFactory> */
    use HasFactory;
    protected $fillable = ['job_id', 'name', 'email'];
    public function job()
    {
        return $this->belongsTo(\App\Models\JobPost::class, 'job_id');
    }
}
