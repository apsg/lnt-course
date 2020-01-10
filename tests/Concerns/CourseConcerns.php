<?php
namespace Tests\Concerns;

use App\Domains\Courses\Models\Course;
use App\User;

trait CourseConcerns
{
    public function createCourse(User $user, array $attributes = []) : Course
    {
        return factory(Course::class)->create(array_merge([
            'user_id' => $user->id,
        ], $attributes));
    }
}
