<?php

use App\Helpers\PermissionsHelper;
use App\Helpers\RolesHelper;

return [
    RolesHelper::SUPERADMIN => [
        // all
    ],

    RolesHelper::ME => [
        PermissionsHelper::COURSE_ADD_TRAINER,
        PermissionsHelper::COURSE_ADD_ADEPT,
        PermissionsHelper::COURSE_EDIT_OWN,
        PermissionsHelper::APPLICATION_CONFIRM,
        PermissionsHelper::APPLICATION_REJECT,
        PermissionsHelper::APPLICATION_EDIT_OWN,
        PermissionsHelper::COURSE_APPLY,
        PermissionsHelper::COURSE_VIEW_PARTICIPANT,
    ],

    RolesHelper::TRAINER => [
        PermissionsHelper::COURSE_ADD_ADEPT,
        PermissionsHelper::COURSE_EDIT_OWN,
        PermissionsHelper::APPLICATION_REJECT,
        PermissionsHelper::APPLICATION_CONFIRM,
        PermissionsHelper::APPLICATION_EDIT_OWN,
        PermissionsHelper::COURSE_APPLY,
        PermissionsHelper::COURSE_VIEW_PARTICIPANT,
    ],

    RolesHelper::USER => [
        PermissionsHelper::COURSE_APPLY,
        PermissionsHelper::APPLICATION_EDIT_OWN,
        PermissionsHelper::COURSE_VIEW_PARTICIPANT,
    ],
];
