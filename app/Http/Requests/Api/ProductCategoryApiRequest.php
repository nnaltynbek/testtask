<?php

namespace App\Http\Requests\Api;

use App\Models\Entities\ProductCategory;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property  $parent_category_id
 */
class ProductCategoryApiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->can('createOrUpdate', ProductCategory::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'parent_category_id' => 'nullable|exists:product_categories,id',
        ];
    }
}