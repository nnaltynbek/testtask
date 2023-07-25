<?php

namespace App\Services\System;

use App\Http\Requests\Api\ProductApiRequest;
use App\Models\Entities\Product;
use Illuminate\Http\Request;

interface ProductService
{

    public function save(ProductApiRequest $request);

    public function update(Product $product, ProductApiRequest $request);

    public function delete(Product $product);

    public function getAll(Request $request);
}