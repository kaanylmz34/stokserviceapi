<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Requests\DeleteProductRequest;
use App\Repositories\ProductRepository;

class ProductController extends Controller
{
    
    private ProductRepository $repository;

    /**
     * Dependency Injection
     */
    function __construct(ProductRepository $productRepository)
    {
        $this->repository = $productRepository;
    }

    /**
     * Tüm ürünleri getirir.
     */
    function getAllProducts()
    {
        $records = $this->repository->getAllRecords();
        return response()->json(['status' => true, 'records' => $records]);
    }


    /**
     * Ürün oluşturur.
     */
    function create(CreateProductRequest $request)
    {
        $request->validated();
        $fields = $request->safe()->only(['title', 'stock', 'origin']);

        Product::create($fields);
        return response()->json(['status' => true]);
    }

    /**
     * Ürünü günceller.
     */
    function update(UpdateProductRequest $request)
    {
        $request->validated();
        $fields = $request->safe()->only(['title', 'stock', 'origin']);

        Product::where('id', $request->input('id'))->update($fields);
        return response()->json(['status' => true]);
    }

    /**
     * Ürünü siler.
     */
    function delete(DeleteProductRequest $request)
    {
        $request->validated();

        Product::where('id', $request->input('id'))->delete();
        return response()->json(['status' => true]);
    }
}
