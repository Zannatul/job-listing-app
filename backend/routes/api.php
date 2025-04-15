<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\JobController;
use App\Http\Controllers\Api\JobApplicationController;

Route::prefix('jobs')->group(function () {
    Route::get('/', [JobController::class, 'index']);             // Get all jobs
    Route::get('{id}', [JobController::class, 'show']);           // Get job detail
    Route::post('{id}/apply', [JobApplicationController::class, 'apply']); // Apply
});
