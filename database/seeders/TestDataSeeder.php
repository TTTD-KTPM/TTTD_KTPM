<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Webkul\Category\Models\Category;
use Webkul\Product\Models\Product;
use Webkul\Product\Models\ProductFlat;
use Webkul\Product\Models\ProductInventory;
use Webkul\Inventory\Models\InventorySource;
use Webkul\Attribute\Models\AttributeFamily;
use Webkul\Core\Models\Channel;

class TestDataSeeder extends Seeder
{
    public function run()
    {
        $channel = Channel::first();
        $inventorySource = InventorySource::first();
        $attributeFamily = AttributeFamily::first();
        $category = Category::first();

        // Create test products for Payment & Inventory testing
        $products = [
            [
                'sku' => 'TEST-PRODUCT-001',
                'name' => 'Test Product 1 - Simple',
                'price' => 100.00,
                'quantity' => 50,
                'weight' => 1.0,
            ],
            [
                'sku' => 'TEST-PRODUCT-002',
                'name' => 'Test Product 2 - Low Stock',
                'price' => 200.00,
                'quantity' => 5,
                'weight' => 2.0,
            ],
            [
                'sku' => 'TEST-PRODUCT-003',
                'name' => 'Test Product 3 - Out of Stock',
                'price' => 150.00,
                'quantity' => 0,
                'weight' => 1.5,
            ],
            [
                'sku' => 'TEST-PRODUCT-004',
                'name' => 'Test Product 4 - High Price',
                'price' => 1000.00,
                'quantity' => 20,
                'weight' => 3.0,
            ],
            [
                'sku' => 'TEST-PRODUCT-005',
                'name' => 'Test Product 5 - Discount Item',
                'price' => 75.00,
                'quantity' => 100,
                'weight' => 0.5,
            ],
        ];

        foreach ($products as $productData) {
            // Create product
            $product = Product::create([
                'type' => 'simple',
                'attribute_family_id' => $attributeFamily->id,
                'sku' => $productData['sku'],
            ]);

            // Add product attribute values
            $product->attribute_values()->create([
                'locale' => 'en',
                'channel' => $channel->code,
                'text_value' => $productData['name'],
                'attribute_id' => 2, // name attribute
            ]);

            $product->attribute_values()->create([
                'locale' => 'en',
                'channel' => $channel->code,
                'text_value' => 'Description for ' . $productData['name'],
                'attribute_id' => 9, // description attribute
            ]);

            $product->attribute_values()->create([
                'locale' => 'en',
                'channel' => $channel->code,
                'text_value' => 'Short description for ' . $productData['name'],
                'attribute_id' => 10, // short_description attribute
            ]);

            $product->attribute_values()->create([
                'decimal_value' => $productData['price'],
                'attribute_id' => 11, // price attribute
            ]);

            $product->attribute_values()->create([
                'decimal_value' => $productData['weight'],
                'attribute_id' => 5, // weight attribute
            ]);

            $product->attribute_values()->create([
                'integer_value' => 1, // New
                'attribute_id' => 26, // status attribute
            ]);

            $product->attribute_values()->create([
                'boolean_value' => 1,
                'attribute_id' => 8, // visible_individually
            ]);

            // Add to category
            $product->categories()->attach($category->id);

            // Add to channel
            $product->channels()->attach($channel->id);

            // Create inventory
            ProductInventory::create([
                'qty' => $productData['quantity'],
                'product_id' => $product->id,
                'inventory_source_id' => $inventorySource->id,
                'vendor_id' => 0,
            ]);

            // Create product flat for search
            ProductFlat::create([
                'sku' => $productData['sku'],
                'name' => $productData['name'],
                'description' => 'Description for ' . $productData['name'],
                'short_description' => 'Short description for ' . $productData['name'],
                'url_key' => strtolower(str_replace(' ', '-', $productData['name'])),
                'new' => 1,
                'featured' => 0,
                'status' => 1,
                'visible_individually' => 1,
                'thumbnail' => null,
                'price' => $productData['price'],
                'cost' => null,
                'special_price' => null,
                'special_price_from' => null,
                'special_price_to' => null,
                'weight' => $productData['weight'],
                'color' => null,
                'color_label' => null,
                'size' => null,
                'size_label' => null,
                'locale' => 'en',
                'channel' => $channel->code,
                'product_id' => $product->id,
                'parent_id' => null,
                'min_price' => $productData['price'],
                'max_price' => $productData['price'],
            ]);

            echo "Created product: {$productData['name']} (SKU: {$productData['sku']}, Qty: {$productData['quantity']})\n";
        }

        echo "\n✅ Test data seeding completed!\n";
        echo "Created " . count($products) . " test products\n";
    }
}
