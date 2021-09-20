<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Product extends Model
{
    use HasFactory;

protected $fillable = [
    'id',
    'title',
    'description',
    'short_description',
    'SKU',
    'price',
    'discount',
    'in_stock',
    'thumbnail'
];

    public function gallery()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function collator_get_sort_key()
    {
        return $this->belongsTo(Category::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
}
