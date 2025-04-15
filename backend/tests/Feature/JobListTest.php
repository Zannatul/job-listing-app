<?php

namespace Tests\Feature;

use Tests\TestCase;
use Mockery;
use App\Services\Interfaces\JobServiceInterface;

class JobListTest extends TestCase
{
    public function test_mocked_job_list_response()
    {
        $mock = Mockery::mock(JobServiceInterface::class);
        $mock->shouldReceive('getAllJobs')
             ->once()
             ->andReturn([
                 (object)[
                     'id' => 1,
                     'title' => 'Mock Developer',
                     'company_name' => 'Mock Co',
                     'description' => 'Mocked Job Description',
                     'view_count' => 5,
                     'applications' => 3
                 ]
             ]);

        $this->app->instance(JobServiceInterface::class, $mock);
        $response = $this->getJson('/api/jobs');
        $response->assertStatus(200)
                 ->assertJsonFragment(['title' => 'Mock Developer']);
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}
