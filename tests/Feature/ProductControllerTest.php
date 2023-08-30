<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    /**
     * Transaksiyonel test.
     */
    use DatabaseTransactions;

    /**
     * Endpoint: /all/products
     */
    public function test_get_all_products(): void
    {
        $response = $this->get('/api/products');
        $response->assertStatus(200)
                 ->assertJsonFragment(
                    [
                        'status' => true,
                    ]
                 );
    }
}
