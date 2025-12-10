<?php

return [
    /**
     * Dashboard.
     */
    [
        'key'        => 'dashboard',
        'name'       => 'Dashboard',
        'route'      => 'admin.dashboard.index',
        'sort'       => 1,
        'icon'       => 'icon-dashboard',
    ],

    /**
     * Sales (Payment Process)
     */
    [
        'key'        => 'sales',
        'name'       => 'Sales',
        'route'      => 'admin.sales.orders.index',
        'sort'       => 2,
        'icon'       => 'icon-sales',
    ], [
        'key'        => 'sales.orders',
        'name'       => 'Orders',
        'route'      => 'admin.sales.orders.index',
        'sort'       => 1,
        'icon'       => '',
    ], [
        'key'        => 'sales.invoices',
        'name'       => 'Invoices',
        'route'      => 'admin.sales.invoices.index',
        'sort'       => 2,
        'icon'       => '',
    ],

    /**
     * Catalog (Inventory Management)
     */
    [
        'key'        => 'catalog',
        'name'       => 'Catalog',
        'route'      => 'admin.catalog.products.index',
        'sort'       => 3,
        'icon'       => 'icon-product',
    ], [
        'key'        => 'catalog.products',
        'name'       => 'Products',
        'route'      => 'admin.catalog.products.index',
        'sort'       => 1,
        'icon'       => '',
    ],

    /**
     * Settings (Inventory Sources only)
     */
    [
        'key'        => 'settings',
        'name'       => 'Settings',
        'route'      => 'admin.settings.inventory_sources.index',
        'sort'       => 4,
        'icon'       => 'icon-settings',
        'icon-class' => 'settings-icon',
    ], [
        'key'        => 'settings.inventory_sources',
        'name'       => 'Inventory Sources',
        'route'      => 'admin.settings.inventory_sources.index',
        'sort'       => 1,
        'icon'       => '',
    ],
];
