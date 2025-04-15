<?php

namespace App\Mail;

use App\Models\Application;
use App\Models\JobPost;
use App\Models\JobApplication;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class JobApplicationReceived extends Mailable
{
    use Queueable, SerializesModels;

    public $job;
    public $application;

    public function __construct(JobPost $job, Application $application)
    {
        $this->job = $job;
        $this->application = $application;
    }

    public function build()
    {
        return $this->subject("New Application for: {$this->job->title}")
                    ->markdown('emails.job-application');
    }
}
