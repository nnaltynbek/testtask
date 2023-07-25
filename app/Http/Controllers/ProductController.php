<?php

namespace App\Http\Controllers;

use App\Http\Requests\Api\ProductApiRequest;
use App\Models\Entities\Product;
use App\Services\System\ProductService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(private readonly ProductService $productService)
    {
    }


    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return $this->ok($this->productService->getAll($request));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductApiRequest $request): JsonResponse
    {
        return $this->ok($this->productService->save($request));
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product): JsonResponse
    {
        return $this->ok($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Product $product, ProductApiRequest $request): JsonResponse
    {
        return $this->ok($this->productService->update($product, $request));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product): JsonResponse
    {
        return $this->ok($this->productService->delete($product));
    }
}
