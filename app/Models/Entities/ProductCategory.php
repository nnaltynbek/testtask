<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'parent_category_id',
    ];


    protected $with = [
        'parent_category'
    ];

    protected $hidden = [
        'parent_category_id'
    ];

    public function parent_category(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'parent_category_id', 'id');
    }

}
