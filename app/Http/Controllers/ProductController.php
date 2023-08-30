<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProductRepository;

class ProductController extends Controller
{
    
    private ProductRepository $repository;

    function __construct(ProductRepository $productRepository)
    {
        $this->repository = $productRepository;
    }

    /**
     * Tüm ürünleri getirir.
     */
    function getAllProducts()
    {
        return response()->json(['status' => true, 'records' => $this->repository->getAllRecords()]);
    }

}
