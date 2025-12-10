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
        \Webkul\Admin\Providers\ModuleServiceProvider::class,
        \Webkul\Attribute\Providers\ModuleServiceProvider::class,  // Required by Product
        \Webkul\Category\Providers\ModuleServiceProvider::class,
        \Webkul\Product\Providers\ModuleServiceProvider::class,    // Required by Customer (wishlist)
        \Webkul\Shop\Providers\ModuleServiceProvider::class,      // Frontend shop interface
        \Webkul\Checkout\Providers\ModuleServiceProvider::class,  // Required by Customer (cart references)
        \Webkul\Payment\Providers\ModuleServiceProvider::class,   // Payment methods and processing
        \Webkul\Shipping\Providers\ModuleServiceProvider::class,  // Shipping methods and rates
        \Webkul\Sales\Providers\ModuleServiceProvider::class,    // Required by Customer (order references)
        \Webkul\Inventory\Providers\ModuleServiceProvider::class,  // Required by Product
        
        // 🔧 UTILITY MODULES:
        \Webkul\DataGrid\Providers\ModuleServiceProvider::class,  // Required by Shop (customer tables)
        \Webkul\Theme\Providers\ModuleServiceProvider::class,     // Required by Installer (theme seeding)
        \Webkul\CMS\Providers\ModuleServiceProvider::class,       // Required by Installer
        \Webkul\User\Providers\ModuleServiceProvider::class,      // Required by Installer (admin users)
        
        // 🎯 ADVANCED FEATURES:
        \Webkul\GDPR\Providers\ModuleServiceProvider::class,     // Required by Shop (customer data management)
        
        // 🎪 MARKETING ECOSYSTEM:
        \Webkul\Rule\Providers\ModuleServiceProvider::class,     // Base rule functionality for promotions
        \Webkul\Marketing\Providers\ModuleServiceProvider::class, // Marketing campaigns, events, search terms, URL rewrites
        \Webkul\CartRule\Providers\ModuleServiceProvider::class,  // Shopping cart promotions (depends on Rule, Customer)
        \Webkul\CatalogRule\Providers\ModuleServiceProvider::class, // Product catalog promotions (depends on Rule, Product)
        
        // \Webkul\BookingProduct\Providers\ModuleServiceProvider::class,
        // \Webkul\DataTransfer\Providers\ModuleServiceProvider::class,
        // \Webkul\Notification\Providers\ModuleServiceProvider::class,
        \Webkul\Paypal\Providers\ModuleServiceProvider::class,
        // \Webkul\Rule\Providers\ModuleServiceProvider::class,
        // \Webkul\Sitemap\Providers\ModuleServiceProvider::class,
        // \Webkul\SocialLogin\Providers\ModuleServiceProvider::class,
    ],

];
