<?php

namespace App\Http\Requests\Api;

use App\Models\Entities\Product;
use Illuminate\Foundation\Http\FormRequest;

class ProductApiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->can('createOrUpdate', Product::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $product = request()->route()->getName() != "product.update";

        return [
            'name' => 'required|string',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:product_categories,id',
            'price' => 'float|required',
            'image' => [$product ? 'required' : 'nullable', 'image', 'mimes:jpeg,png', 'max:5120']

        ];
    }
}