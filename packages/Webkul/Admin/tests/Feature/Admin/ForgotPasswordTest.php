<?php

use Illuminate\Support\Facades\Notification;
use Webkul\Admin\Mail\Admin\ResetPasswordNotification;
use Webkul\User\Models\Admin;

use function Pest\Laravel\postJson;

it('should send the reset password link', function () {
    // Arrange.
    Notification::fake();

    // Debug: Check if Admin factory is working
    echo "\n🔍 Debug: Creating admin user...\n";
    $admin = Admin::factory()->create();
    echo "✅ Debug: Admin created - ID: {$admin->id}, Email: {$admin->email}, Name: {$admin->name}\n";

    // Debug: Check if route exists
    echo "🔍 Debug: Checking routes...\n";
    $forgetPasswordStoreRoute = route('admin.forget_password.store');
    $forgetPasswordCreateRoute = route('admin.forget_password.create');
    echo "✅ Debug: Store route: {$forgetPasswordStoreRoute}\n";
    echo "✅ Debug: Create route: {$forgetPasswordCreateRoute}\n";

    // Debug: Check database before request
    echo "🔍 Debug: Checking database before request...\n";
    $existingResets = \DB::table('admin_password_resets')->where('email', $admin->email)->count();
    echo "✅ Debug: Existing password resets for {$admin->email}: {$existingResets}\n";

    // Act and Assert.
    echo "🔍 Debug: Making POST request to forgot password...\n";
    $response = postJson(route('admin.forget_password.store'), [
        'email' => $admin->email,
    ]);
    
    echo "✅ Debug: Response status: {$response->status()}\n";
    echo "✅ Debug: Response headers: " . json_encode($response->headers->all()) . "\n";
    
    $response->assertRedirect(route('admin.forget_password.create'))
        ->isRedirection();

    // Debug: Check database after request
    echo "🔍 Debug: Checking database after request...\n";
    $newResets = \DB::table('admin_password_resets')->where('email', $admin->email)->count();
    echo "✅ Debug: New password resets for {$admin->email}: {$newResets}\n";

    $this->assertDatabaseHas('admin_password_resets', [
        'email' => $admin->email,
    ]);

    echo "🔍 Debug: Checking notifications...\n";
    Notification::assertSentTo(
        $admin,
        ResetPasswordNotification::class,
    );

    Notification::assertCount(1);
    echo "✅ Debug: All assertions passed!\n";
});
