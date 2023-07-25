<?php

namespace App\Services\System\Impl;

use App\Http\Requests\Api\ProductCategoryApiRequest;
use App\Models\Entities\ProductCategory;
use App\Services\System\ProductCategoryService;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductCategoryServiceImpl implements ProductCategoryService
{

    public function save(ProductCategoryApiRequest $request)
    {
        $category = ProductCategory::query()->create([
            'name' => $request->string('name'),
            'parent_category_id' => $request->parent_category_id,
        ]);

        return $category->load('parent_category');
    }

    public function update(ProductCategory $productCategory, ProductCategoryApiRequest $request)
    {
        $productCategory->update([
            'name' => $request->string('name'),
            'parent_category_id' => $request->integer('parent_category_id'),
        ]);
        return $productCategory->load('parent_category');

    }

    public function delete(ProductCategory $productCategory)
    {
        $productCategory->delete();
    }

    public function getAll(Request $request): LengthAwarePaginator
    {
        $query = $request->boolean('archived')
            ? ProductCategory::onlyTrashed()
            : ProductCategory::query();

        if (!empty($search = (string)$request->input('search'))) {
            $query = $query->where('name', 'like', "%$search%");
        }

        return $query->paginate(
            perPage: $request->input('per_page'),
            page: $request->input('page')
        );
    }
}