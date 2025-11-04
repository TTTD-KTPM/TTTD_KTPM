<?php

return [

    /**
     * The path of the convention file.
     * TODO: Uncomment when Core package is added to repository.
     */
    // 'convention' => Webkul\Core\CoreConvention::class,

    /**
     * Bagisto modules to be loaded by Concord.
     * 
     * TODO: Uncomment modules as they are added to the repository incrementally:
     */
    'modules' => [
        // 🏗️ FOUNDATION MODULES (Add these first):
        \Webkul\Core\Providers\ModuleServiceProvider::class,
        \Webkul\Customer\Providers\ModuleServiceProvider::class,
        \Webkul\Tax\Providers\ModuleServiceProvider::class,
        
        // 📦 FEATURE MODULES (Add incrementally):
        // \Webkul\Admin\Providers\ModuleServiceProvider::class,
        // \Webkul\User\Providers\ModuleServiceProvider::class,
        \Webkul\Attribute\Providers\ModuleServiceProvider::class,  // Required by Product
        \Webkul\Category\Providers\ModuleServiceProvider::class,
        \Webkul\Product\Providers\ModuleServiceProvider::class,    // Required by Customer (wishlist)
        // \Webkul\Shop\Providers\ModuleServiceProvider::class,
        // \Webkul\Checkout\Providers\ModuleServiceProvider::class,
        // \Webkul\Payment\Providers\ModuleServiceProvider::class,
        // \Webkul\Sales\Providers\ModuleServiceProvider::class,
        // \Webkul\Inventory\Providers\ModuleServiceProvider::class,
        
        // 🔧 UTILITY MODULES:
        // \Webkul\DataGrid\Providers\ModuleServiceProvider::class,
        // \Webkul\Theme\Providers\ModuleServiceProvider::class,
        // \Webkul\CMS\Providers\ModuleServiceProvider::class,
        
        // 🎯 ADVANCED FEATURES:
        // \Webkul\BookingProduct\Providers\ModuleServiceProvider::class,
        // \Webkul\CartRule\Providers\ModuleServiceProvider::class,
        // \Webkul\CatalogRule\Providers\ModuleServiceProvider::class,
        // \Webkul\DataTransfer\Providers\ModuleServiceProvider::class,
        // \Webkul\GDPR\Providers\ModuleServiceProvider::class,
        // \Webkul\Marketing\Providers\ModuleServiceProvider::class,
        // \Webkul\Notification\Providers\ModuleServiceProvider::class,
        // \Webkul\Paypal\Providers\ModuleServiceProvider::class,
        // \Webkul\Rule\Providers\ModuleServiceProvider::class,
        // \Webkul\Shipping\Providers\ModuleServiceProvider::class,
        // \Webkul\Sitemap\Providers\ModuleServiceProvider::class,
        // \Webkul\SocialLogin\Providers\ModuleServiceProvider::class,
    ],

];
