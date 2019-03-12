<?php 
declare(strict_types=1);

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @covers \App\Project
 */
class ProjectTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Project should have a path.
     *
     * @test
     *
     * @return void
     */
    public function it_has_a_path(): void
    {
        $project = \factory('App\Project')->create();

        $this->assertEquals('/projects/' . $project->id, $project->path());
    }

    /** @test */
    public function it_belongs_to_an_owner(): void
    {
        $project = \factory('App\Project')->create();

        $this->assertInstanceOf('App\User', $project->owner);
    }

    /** @test */
    public function it_can_add_tasks(): void
    {
        $project = \factory('App\Project')->create();

        $task = $project->addTask('Test task');

        self::assertCount(1, $project->tasks);
        self::assertTrue($project->tasks->contains($task));
    }
}
