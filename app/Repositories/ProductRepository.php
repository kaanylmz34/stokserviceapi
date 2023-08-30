<?php

    namespace App\Repositories;
    
    use App\Models\Product;

    class ProductRepository extends BaseRepository
    {

        function __construct()
        {
            $this->model = new Product;
        }

    }