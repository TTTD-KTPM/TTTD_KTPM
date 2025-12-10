<?php

use Webkul\Product\Helpers\ProductType;
use Webkul\Core\Models\Channel;
use Webkul\Inventory\Models\InventorySource;
use Webkul\Attribute\Models\AttributeFamily;
use Webkul\Category\Models\Category;

$channel = Channel::first();
$inventorySource = InventorySource::first();
$attributeFamily = AttributeFamily::first();
$category = Category::where('parent_id', 1)->first();

$testProducts = [
    [
        'type' => 'simple',
        'attribute_family_id' => $attributeFamily->id,
        'sku' => 'TEST-001',
        'name' => 'Test Product 1',
        'url_key' => 'test-product-1',
        'price' => 100,
        'weight' => 1,
        'status' => 1,
        'visible_individually' => 1,
        'guest_checkout' => 1,
        'manage_stock' => 1,
        'qty' => 50,
        'inventories' => [
            $inventorySource->id => 50
        ],
        'channels' => [$channel->id],
        'categories' => [$category->id],
    ],
    [
        'type' => 'simple',
        'attribute_family_id' => $attributeFamily->id,
        'sku' => 'TEST-002',
        'name' => 'Test Product 2 - Low Stock',
        'url_key' => 'test-product-2',
        'price' => 200,
        'weight' => 2,
        'status' => 1,
        'visible_individually' => 1,
        'guest_checkout' => 1,
        'manage_stock' => 1,
        'qty' => 5,
        'inventories' => [
            $inventorySource->id => 5
        ],
        'channels' => [$channel->id],
        'categories' => [$category->id],
    ],
    [
        'type' => 'simple',
        'attribute_family_id' => $attributeFamily->id,
        'sku' => 'TEST-003',
        'name' => 'Test Product 3 - Out of Stock',
        'url_key' => 'test-product-3',
        'price' => 150,
        'weight' => 1.5,
        'status' => 1,
        'visible_individually' => 1,
        'guest_checkout' => 1,
        'manage_stock' => 1,
        'qty' => 0,
        'inventories' => [
            $inventorySource->id => 0
        ],
        'channels' => [$channel->id],
        'categories' => [$category->id],
    ],
];

foreach ($testProducts as $productData) {
    try {
        $product = app('Webkul\Product\Repositories\ProductRepository')->create($productData);
        echo "✅ Created: {$productData['name']} (SKU: {$productData['sku']}, Qty: {$productData['qty']})\n";
    } catch (\Exception $e) {
        echo "❌ Error creating {$productData['sku']}: " . $e->getMessage() . "\n";
    }
}

echo "\n✅ Test products creation completed!\n";
