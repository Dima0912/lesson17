<?php

namespace App\Models;

use App\Service\ImageService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    public function products()
    {
        return $this->belongsTo(Product::class);
    }

    public function gelery()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function setThumbnailAttribute($image)
    {
        $this->attributes['thumbnail'] = ImageService::upload($image);
    }
}
