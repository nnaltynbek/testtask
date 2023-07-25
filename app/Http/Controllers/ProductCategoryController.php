<?php

namespace App\Http\Controllers;

use App\Http\Requests\Api\ProductCategoryApiRequest;
use App\Models\Entities\ProductCategory;
use App\Services\System\ProductCategoryService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function __construct(private readonly ProductCategoryService $productCategoryService)
    {
    }


    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return $this->ok($this->productCategoryService->getAll($request));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductCategoryApiRequest $request): JsonResponse
    {
        return $this->ok($this->productCategoryService->save($request));
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductCategory $category): JsonResponse
    {
        return $this->ok($category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductCategory $category, ProductCategoryApiRequest $request): JsonResponse
    {
        return $this->ok($this->productCategoryService->update($category, $request));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductCategory $productCategory)
    {
        return $this->ok($this->productCategoryService->delete($productCategory));
    }
}
