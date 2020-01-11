<?php

namespace App\Helpers;

abstract class PermissionsHelper
{
    /**
     * Courses
     */
    const COURSE_ADD_TRAINER = 'add trainer course';
    const COURSE_ADD_ADEPT = 'add adept course';
    const COURSE_EDIT_OWN = 'edit own course';
    const COURSE_EDIT_ANY = 'edit any course';
    const COURSE_APPLY = 'apply course';
    const COURSE_VIEW_PARTICIPANT = 'view participant course';

    /**
     * Applications
     */
    const APPLICATION_CONFIRM = 'confirm own application';
    const APPLICATION_REJECT = 'reject own application';
    const APPLICATION_EDIT_OWN = 'edit own application';
}
