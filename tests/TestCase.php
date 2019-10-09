<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Artisan;
use Tests\Concerns\UserConcerns;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use UserConcerns;

    protected function setUp() : void
    {
        parent::setUp();

        Artisan::call('roles:sync');
    }
}
