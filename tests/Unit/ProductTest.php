<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use App\Repositories\ProductRepository;
use App\Models\Origin;
use App\Models\Product;

class ProductTest extends TestCase
{

    /**
     * Transaksiyonel test.
     */
    use DatabaseTransactions;

    /**
     * Birkaç ürün oluşturur.
     */
    public function test_save_some_products(): void
    {

        Origin::factory()
              ->count(5)
              ->create();

        $this->assertSame(Origin::count(), 5);

        Product::factory()
               ->count(100)
               ->create();

        $this->assertSame(Product::count(), 100);
    }

    /**
     * Tüm ürünlerin getirildiğinden emin olunur.
     */
    public function test_get_all_products(): void
    {
        
        Origin::factory()
              ->count(5)
              ->create();

        Product::factory()
               ->count(100)
               ->create();

        $products = (new ProductRepository())->getAllRecords();

        foreach ($products as $product)
        {
            $this->assertDatabaseHas('products',
            [
                'id' => $product->id,
                'title' => $product->title,
                'stock' => $product->stock,
                'origin' => $product->origin,
                'created_at' => $product->created_at,
                'updated_at' => $product->updated_at,
                'deleted_at' => $product->deleted_at,
            ]);
        }
    }
}
