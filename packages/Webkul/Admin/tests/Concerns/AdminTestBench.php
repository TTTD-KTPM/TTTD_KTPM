<?php

namespace Webkul\Admin\Tests\Concerns;

use Illuminate\Testing\TestResponse;
use Webkul\User\Contracts\Admin as AdminContract;
use Webkul\User\Models\Admin as AdminModel;

trait AdminTestBench
{
    /**
     * Login as admin.
     */
    public function loginAsAdmin(?AdminContract $admin = null): AdminContract
    {
        $admin = $admin ?? AdminModel::factory()->create();

        $this->actingAs($admin, 'admin');

        return $admin;
    }
    
    /**
     * Send a POST JSON request without CSRF middleware.
     */
    public function postJsonWithoutCsrf(string $uri, array $data = [], array $headers = []): TestResponse
    {
        return $this->withoutMiddleware(\Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class)
            ->postJson($uri, $data, $headers);
    }
}
