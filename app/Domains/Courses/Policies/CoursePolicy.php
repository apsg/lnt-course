<?php

namespace App\Domains\Courses\Policies;

use App\Domains\Courses\Models\Course;
use App\Helpers\PermissionsHelper;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CoursePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user) : bool
    {
        return true;
    }

    public function view(User $user, Course $course) : bool
    {
        return $user->can(PermissionsHelper::COURSE_APPLY);
    }

    public function create(User $user) : bool
    {
        return $user->can(PermissionsHelper::COURSE_ADD_TRAINER)
            || $user->can(PermissionsHelper::COURSE_ADD_ADEPT);
    }

    public function update(User $user, Course $course) : bool
    {
        if ($user->can(PermissionsHelper::COURSE_EDIT_ANY)) {
            return true;
        }

        if ($user->can(PermissionsHelper::COURSE_EDIT_OWN)) {
            return $user->id === $course->user_id;
        }

        return false;
    }

    public function delete(User $user, Course $course) : bool
    {
        return $user->id === $course->user_id;
    }

    public function restore(User $user, Course $course) : bool
    {
        return $user->can(PermissionsHelper::COURSE_EDIT_ANY);
    }

    public function forceDelete(User $user, Course $course) : bool
    {
        return $user->can(PermissionsHelper::COURSE_EDIT_ANY);
    }
}
