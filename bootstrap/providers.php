<?php

return [
    /**
     * Application service providers.
     */
    App\Providers\AppServiceProvider::class,

    /**
     * Webkul's service providers.
     * 
     * TODO: Uncomment packages as they are added to the repository incrementally:
     */
    
    // 🏗️ FOUNDATION PACKAGES (Add these first):
    Webkul\Core\Providers\CoreServiceProvider::class,
    Webkul\Core\Providers\EnvValidatorServiceProvider::class,
    Webkul\Customer\Providers\CustomerServiceProvider::class,
    Webkul\Tax\Providers\TaxServiceProvider::class,
    Webkul\Category\Providers\CategoryServiceProvider::class,  // Required by Core (foreign key)
    
    // 📦 FEATURE PACKAGES (Add incrementally):
    Webkul\Admin\Providers\AdminServiceProvider::class,
    Webkul\Attribute\Providers\AttributeServiceProvider::class,  // Required by Product
    Webkul\Product\Providers\ProductServiceProvider::class,      // Required by Customer (wishlist)
    Webkul\Shop\Providers\ShopServiceProvider::class,          // Frontend shop interface (login, register, menu)
    Webkul\Checkout\Providers\CheckoutServiceProvider::class,   // Required by Customer (cart references)
    Webkul\Payment\Providers\PaymentServiceProvider::class,
    Webkul\Sales\Providers\SalesServiceProvider::class,        // Required by Customer (order references)
    Webkul\Inventory\Providers\InventoryServiceProvider::class,  // Required by Product (inventory sources)
    
    // 🔧 UTILITY PACKAGES:
    Webkul\DataGrid\Providers\DataGridServiceProvider::class,  // Required by Shop (customer order tables)
    Webkul\Theme\Providers\ThemeServiceProvider::class,        // Required by Installer (theme seeding)
    Webkul\CMS\Providers\CMSServiceProvider::class,            // Required by Installer (seeding CMS pages)
    Webkul\User\Providers\UserServiceProvider::class,          // Required by Installer (admin users)
    
    // 🎯 ADVANCED FEATURES:
    Webkul\GDPR\Providers\GDPRServiceProvider::class,          // Required by Shop (customer data requests)
    
    // 🎪 MARKETING ECOSYSTEM:
    Webkul\Rule\Providers\RuleServiceProvider::class,          // Base rule functionality for promotions  
    Webkul\Marketing\Providers\MarketingServiceProvider::class, // Marketing campaigns, events, search terms, URL rewrites
    Webkul\CartRule\Providers\CartRuleServiceProvider::class,   // Shopping cart promotions (depends on Rule, Customer)
    Webkul\CatalogRule\Providers\CatalogRuleServiceProvider::class, // Product catalog promotions (depends on Rule, Product)
    
    // Webkul\BookingProduct\Providers\BookingProductServiceProvider::class,
    // Webkul\DataTransfer\Providers\DataTransferServiceProvider::class,
    // Webkul\Notification\Providers\NotificationServiceProvider::class,
    Webkul\Paypal\Providers\PaypalServiceProvider::class,
    Webkul\Shipping\Providers\ShippingServiceProvider::class,
    // Webkul\Sitemap\Providers\SitemapServiceProvider::class,
    // Webkul\SocialLogin\Providers\SocialLoginServiceProvider::class,
    // Webkul\SocialShare\Providers\SocialShareServiceProvider::class,
    
    // 🔍 DEVELOPMENT TOOLS:
    // Webkul\DebugBar\Providers\DebugBarServiceProvider::class,
    // Webkul\FPC\Providers\FPCServiceProvider::class,
    // Webkul\GDPR\Providers\GDPRServiceProvider::class,
    Webkul\Installer\Providers\InstallerServiceProvider::class,
    // Webkul\MagicAI\Providers\MagicAIServiceProvider::class,
    // Webkul\Rule\Providers\RuleServiceProvider::class,
];
