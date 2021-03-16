<?php

namespace App\Models;

use App\Casts\Json;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ["title", "price", "product_category_id", "slug", "image_src"];
    protected $casts = [
        "title" => Json::class,
    ];
    public function attributes()
    {
        return $this->hasMany(ProductAttribute::class);
    }
    public function category()
    {
        return $this->belongsTo(ProductCategory::class, "product_category_id");
    }
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
}