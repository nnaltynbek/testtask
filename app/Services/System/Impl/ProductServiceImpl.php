<?php

namespace App\Services\System\Impl;

use App\Http\Requests\Api\ProductApiRequest;
use App\Models\Entities\Product;
use App\Models\Entities\ProductCategory;
use App\Services\Common\SystemFileService;
use App\Services\System\ProductService;

class ProductServiceImpl implements ProductService
{

    /**
     * @var SystemFileService $fileService ;
     */
    protected SystemFileService $fileService;

    /**
     * @param SystemFileService $fileService
     */
    public function __construct(SystemFileService $fileService)
    {
        $this->fileService = $fileService;
    }

    public function save(ProductApiRequest $request)
    {
        $img_path = '';
        if ($request->hasFile('image')) {
            $img_path = $this->fileService->store($request->file('image'), Product::FILE_STORE);
        }
        return Product::query()->create([
            'name' => $request->string('name'),
            'image_path' => $img_path,
            'description' => $request->string('description'),
            'price' => $request->float('price'),
            'category_id' => $request->integer('category_id'),
        ]);
    }

    public function update(Product $product, ProductApiRequest $request)
    {
        $img_path = $product->image_path;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filePath = $this->fileService
                ->updateWithRemoveOrStore($image, Product::FILE_STORE, $product->image_path);
            $img_path = $filePath;
        }

        return $product->update([
            'name' => $request->string('name'),
            'image_path' => $img_path,
            'description' => $request->string('description'),
            'price' => $request->float('price'),
            'category_id' => $request->integer('category_id'),
        ]);
    }

    public function delete(Product $product): void
    {
        $this->fileService->remove($product->image_path);
        $product->delete();
    }

    public function getAll(\Illuminate\Http\Request $request)
    {
        $query = $request->boolean('archived')
            ? Product::onlyTrashed()
            : Product::query();

        if (!empty($search = (string)$request->input('search'))) {
            $query = $query->where('name', 'like', "%$search%");
        }

        return $query->paginate(
            perPage: $request->input('per_page'),
            page: $request->input('page')
        );
    }
}