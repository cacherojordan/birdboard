<?php

namespace Tests\Feature;

use App\Project;
use App\Task;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectTasksTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_project_can_have_tasks()
    {
        $this->signIn();

        $project = \factory(Project::class)->create(['owner_id' => \auth()->id()]);

        $this->post($project->path() . '/tasks', ['body' => 'Test task']);

        $this->get($project->path())->assertSee('Test task');
    }
    
    /** @test */
    public function a_tasks_requires_a_body(): void
    {
        $this->signIn();

        $project = \factory(Project::class)->create(['owner_id' => \auth()->id()]);

        $attributes = \factory(Task::class)->raw(['body' => '']);

        $this->post($project->path() . '/tasks', $attributes)->assertSessionHasErrors(['body']);
    }
}
