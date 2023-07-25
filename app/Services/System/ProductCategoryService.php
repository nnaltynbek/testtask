<?php

namespace App\Services\System;

use App\Http\Requests\Api\ProductCategoryApiRequest;
use App\Models\Entities\ProductCategory;
use Illuminate\Http\Request;

interface ProductCategoryService
{

    public function save(ProductCategoryApiRequest $request);

    public function update(ProductCategory $productCategory, ProductCategoryApiRequest $request);

    public function delete(ProductCategory $productCategory);

    public function getAll(Request $request);
}