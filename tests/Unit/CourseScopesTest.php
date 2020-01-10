<?php

namespace Tests\Unit;

use App\Domains\Courses\Models\Course;
use Carbon\Carbon;
use Tests\Concerns\CourseConcerns;
use Tests\TestCase;

class CourseScopesTest extends TestCase
{
    use CourseConcerns;

    /**
     * @var \App\User
     */
    protected $user;

    protected function setUp() : void
    {
        parent::setUp();

        $this->user = $this->createUser();
    }

    /** @test */
    public function it_tests_future_scope()
    {
        // given
        $course = $this->createCourse($this->user);
        $pastCourse = $this->createCourse($this->user, [
            'starts_at' => Carbon::now()->subMonth(),
        ]);

        // when
        $courses = Course::isFuture()->get();

        // then
        $this->assertContains($course->id, $courses->pluck('id'));
        $this->assertNotContains($pastCourse->id, $courses->pluck('id'));
    }

    /** @test */
    public function it_tests_published_scope()
    {
        // given
        $course = $this->createCourse($this->user, [
            'published_at' => Carbon::now()->subDay(),
        ]);
        $futureCourse = $this->createCourse($this->user, [
            'published_at' => Carbon::now()->addDay(),
        ]);

        // when
        $courses = Course::isPublished()->get();

        // then
        $this->assertContains($course->id, $courses->pluck('id'));
        $this->assertNotContains($futureCourse->id, $courses->pluck('id'));
    }

    /** @test */
    public function it_tests_open_scope()
    {
        // given
        $course = $this->createCourse($this->user, [
            'closed_at' => Carbon::now()->subDay(),
        ]);
        $futureCourse = $this->createCourse($this->user, [
            'closed_at' => Carbon::now()->addDay(),
        ]);

        // when
        $courses = Course::isOpen()->get();

        // then
        $this->assertNotContains($course->id, $courses->pluck('id'));
        $this->assertContains($futureCourse->id, $courses->pluck('id'));
    }

    /** @test */
    public function it_tests_applicable_scope()
    {
        // given
        $course = $this->createCourse($this->user);
        $closedCourse = $this->createCourse($this->user, [
            'closed_at' => Carbon::now()->subDay(),
        ]);
        $futureCourse = $this->createCourse($this->user, [
            'published_at' => Carbon::now()->addDay(),
        ]);
        $pastCourse = $this->createCourse($this->user, [
            'starts_at' => Carbon::now()->subMonth(),
        ]);

        // when
        $courses = Course::isApplicable()->get();

        // then
        $this->assertContains($course->id, $courses->pluck('id'));
        $this->assertNotContains($closedCourse->id, $courses->pluck('id'));
        $this->assertNotContains($futureCourse->id, $courses->pluck('id'));
        $this->assertNotContains($pastCourse->id, $courses->pluck('id'));
    }
}
