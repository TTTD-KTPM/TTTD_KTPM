<?php

use Illuminate\Support\Facades\Notification;
use Webkul\Admin\Mail\Admin\ResetPasswordNotification;
use Webkul\User\Models\Admin;

use function Pest\Laravel\postJson;

it('should send the reset password link', function () {
    // Arrange.
    Notification::fake();

    // Debug: Check if Admin factory is working
    echo "\n🔍 Debug: About to create admin user via factory...\n";
    echo "🔍 Debug: Admin model class: " . Admin::class . "\n";
    echo "🔍 Debug: Checking if AdminFactory class exists...\n";
    
    try {
        echo "🔍 Debug: Creating factory instance...\n";
        $factory = Admin::factory();
        echo "✅ Debug: Factory instance created: " . get_class($factory) . "\n";
        
        echo "🔍 Debug: About to call definition() method...\n";
        $admin = $factory->create();
        echo "✅ Debug: Admin created successfully - ID: {$admin->id}, Email: {$admin->email}, Name: {$admin->name}\n";
    } catch (\Exception $e) {
        echo "❌ Debug: Factory creation failed!\n";
        echo "❌ Debug: Error: " . $e->getMessage() . "\n";
        echo "❌ Debug: File: " . $e->getFile() . " Line: " . $e->getLine() . "\n";
        echo "❌ Debug: Stack trace:\n" . $e->getTraceAsString() . "\n";
        throw $e;
    }

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
