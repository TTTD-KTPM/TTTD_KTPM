<?php

return [
    /**
     * Catalog.
     */
    [
        'key'        => 'catalog',
        'name'       => 'admin::app.components.layouts.sidebar.catalog',
        'route'      => 'admin.catalog.products.index',
        'sort'       => 1,
        'icon'       => 'icon-product',
    ], [
        'key'        => 'catalog.products',
        'name'       => 'admin::app.components.layouts.sidebar.products',
        'route'      => 'admin.catalog.products.index',
        'sort'       => 1,
        'icon'       => '',
    ], [
        'key'        => 'catalog.categories',
        'name'       => 'admin::app.components.layouts.sidebar.categories',
        'route'      => 'admin.catalog.categories.index',
        'sort'       => 2,
        'icon'       => '',
    ], [
        'key'        => 'catalog.attributes',
        'name'       => 'admin::app.components.layouts.sidebar.attributes',
        'route'      => 'admin.catalog.attributes.index',
        'sort'       => 3,
        'icon'       => '',
    ], [
        'key'        => 'catalog.families',
        'name'       => 'admin::app.components.layouts.sidebar.attribute-families',
        'route'      => 'admin.catalog.families.index',
        'sort'       => 4,
        'icon'       => '',
    ],
];

