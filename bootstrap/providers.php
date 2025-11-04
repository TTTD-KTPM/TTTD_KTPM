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
    // Webkul\Admin\Providers\AdminServiceProvider::class,
    // Webkul\User\Providers\UserServiceProvider::class,
    Webkul\Attribute\Providers\AttributeServiceProvider::class,  // Required by Product
    // Webkul\Category\Providers\CategoryServiceProvider::class,  // Already added above
    Webkul\Product\Providers\ProductServiceProvider::class,      // Required by Customer (wishlist)
    // Webkul\Shop\Providers\ShopServiceProvider::class,
    // Webkul\Checkout\Providers\CheckoutServiceProvider::class,
    // Webkul\Payment\Providers\PaymentServiceProvider::class,
    // Webkul\Sales\Providers\SalesServiceProvider::class,
    Webkul\Inventory\Providers\InventoryServiceProvider::class,  // Required by Product (inventory sources)
    
    // 🔧 UTILITY PACKAGES:
    // Webkul\DataGrid\Providers\DataGridServiceProvider::class,
    // Webkul\Theme\Providers\ThemeServiceProvider::class,
    // Webkul\CMS\Providers\CMSServiceProvider::class,
    
    // 🎯 ADVANCED FEATURES:
    // Webkul\CartRule\Providers\CartRuleServiceProvider::class,
    // Webkul\CatalogRule\Providers\CatalogRuleServiceProvider::class,
    // Webkul\BookingProduct\Providers\BookingProductServiceProvider::class,
    // Webkul\DataTransfer\Providers\DataTransferServiceProvider::class,
    // Webkul\Marketing\Providers\MarketingServiceProvider::class,
    // Webkul\Notification\Providers\NotificationServiceProvider::class,
    // Webkul\Paypal\Providers\PaypalServiceProvider::class,
    // Webkul\Shipping\Providers\ShippingServiceProvider::class,
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
