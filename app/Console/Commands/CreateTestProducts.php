<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Webkul\Core\Models\Channel;
use Webkul\Inventory\Models\InventorySource;
use Webkul\Attribute\Models\AttributeFamily;
use Webkul\Category\Models\Category;

class CreateTestProducts extends Command
{
    protected $signature = 'test:create-products';
    protected $description = 'Create test products for Payment & Inventory testing';

    public function handle()
    {
        $this->info('Creating test products...');

        $channel = Channel::first();
        $inventorySource = InventorySource::first();
        $attributeFamily = AttributeFamily::first();
        $category = Category::where('id', '!=', 1)->first();

        if (!$category) {
            // Create a test category if none exists
            $category = app('Webkul\Category\Repositories\CategoryRepository')->create([
                'locale' => 'en',
                'name' => 'Test Category',
                'slug' => 'test-category',
                'description' => 'Category for test products',
                'display_mode' => 'products_only',
                'status' => 1,
                'parent_id' => 1,
            ]);
            $this->info('Created test category');
        }

        $testProducts = [
            [
                'type' => 'simple',
                'attribute_family_id' => $attributeFamily->id,
                'sku' => 'TEST-001',
                'name' => 'Test Product 1 - In Stock',
                'url_key' => 'test-product-1',
                'price' => 100,
                'weight' => 1,
                'status' => 1,
                'visible_individually' => 1,
                'guest_checkout' => 1,
                'manage_stock' => 1,
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
                'inventories' => [
                    $inventorySource->id => 0
                ],
                'channels' => [$channel->id],
                'categories' => [$category->id],
            ],
            [
                'type' => 'simple',
                'attribute_family_id' => $attributeFamily->id,
                'sku' => 'TEST-004',
                'name' => 'Test Product 4 - High Price',
                'url_key' => 'test-product-4',
                'price' => 1000,
                'weight' => 3,
                'status' => 1,
                'visible_individually' => 1,
                'guest_checkout' => 1,
                'manage_stock' => 1,
                'inventories' => [
                    $inventorySource->id => 20
                ],
                'channels' => [$channel->id],
                'categories' => [$category->id],
            ],
            [
                'type' => 'simple',
                'attribute_family_id' => $attributeFamily->id,
                'sku' => 'TEST-005',
                'name' => 'Test Product 5 - Discount Item',
                'url_key' => 'test-product-5',
                'price' => 75,
                'weight' => 0.5,
                'status' => 1,
                'visible_individually' => 1,
                'guest_checkout' => 1,
                'manage_stock' => 1,
                'inventories' => [
                    $inventorySource->id => 100
                ],
                'channels' => [$channel->id],
                'categories' => [$category->id],
            ],
        ];

        $productRepository = app('Webkul\Product\Repositories\ProductRepository');

        foreach ($testProducts as $productData) {
            try {
                $product = $productRepository->create($productData);
                $this->info("✅ Created: {$productData['name']} (SKU: {$productData['sku']}, Qty: {$productData['inventories'][$inventorySource->id]})");
            } catch (\Exception $e) {
                $this->error("❌ Error creating {$productData['sku']}: " . $e->getMessage());
            }
        }

        $this->info("\n✅ Test products creation completed!");
    }
}
