<?php

namespace Webkul\Admin\Tests;

use Tests\TestCase;
use Webkul\Admin\Tests\Concerns\AdminTestBench;
use Webkul\Core\Tests\Concerns\CoreAssertions;

class AdminTestCase extends TestCase
{
    use AdminTestBench, CoreAssertions;

    /**
     * Setup the test environment.
     */
    protected function setUp(): void
    {
        parent::setUp();

        // Disable CSRF middleware for tests
        $this->withoutMiddleware([
            \Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class,
        ]);
    }
}
