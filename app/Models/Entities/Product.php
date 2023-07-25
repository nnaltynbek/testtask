<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property  string $image_path
 */
class Product extends Model
{
    use HasFactory, SoftDeletes;


    public const FILE_STORE = 'images/products';

    protected $fillable = [
        'name',
        'image_path',
        'price',
        'description',
        'category_id',
    ];

    protected $hidden = [
        'image_path',
    ];


    public function getImageUrlAttribute(): string
    {
        return '';
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'category_id', 'id');
    }

}
