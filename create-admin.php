<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

// Check existing admin
$existingAdmin = \Webkul\User\Models\Admin::where('email', 'admin@example.com')->first();

if ($existingAdmin) {
    // Update password
    $existingAdmin->password = bcrypt('admin123');
    $existingAdmin->status = 1;
    $existingAdmin->save();
    echo "✅ Admin updated!\n";
} else {
    // Create new admin
    $admin = new \Webkul\User\Models\Admin();
    $admin->name = 'Admin';
    $admin->email = 'admin@example.com';
    $admin->password = bcrypt('admin123');
    $admin->role_id = 1;
    $admin->status = 1;
    $admin->save();
    echo "✅ Admin created!\n";
}

echo "\n📧 Email: admin@example.com\n";
echo "🔑 Password: admin123\n";
echo "🌐 Admin URL: http://127.0.0.1:8000/admin\n";
