<?php

use App\Helpers\RolesHelper;

return [
    RolesHelper::SUPERADMIN => [
        // all
    ],

    RolesHelper::MANAGER => [
        'add own course',
        'delete own course',
    ],

    RolesHelper::USER => [
        'course apply',
    ],
];
