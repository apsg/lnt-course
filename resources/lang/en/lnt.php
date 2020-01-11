<?php

use App\Domains\Courses\Models\Course;

return [
    'types' => [
        0                    => 'Nieznany',
        Course::TYPE_ADEPT   => 'Adeptów',
        Course::TYPE_TRAINER => 'Trenerski',
        Course::TYPE_ME      => 'Master Educator',
    ],
];
