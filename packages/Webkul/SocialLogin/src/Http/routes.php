<?php

use Illuminate\Support\Facades\Route;
// use Webkul\SocialLogin\Http\Controllers\LoginController; // ❌ Removed - SocialLogin Module

/**
 * ❌ SocialLogin Module - Removed for optimization
 * Uncomment to re-enable social login (Facebook, Google, etc.)
 */
// Route::controller(LoginController::class)->middleware(['web', 'shop'])->prefix('customer/social-login/{provider}')->group(function () {
//     Route::get('', 'redirectToProvider')->name('customer.social-login.index');
//     Route::get('callback', 'handleProviderCallback')->name('customer.social-login.callback');
// });
