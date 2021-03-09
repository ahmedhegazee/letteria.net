<?php

namespace App\Models;

use App\Casts\Json;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttributeValue extends Model
{
    use HasFactory;
    protected $fillable = ["value", "product_attribute_id"];
    protected $casts = [
        "value" => Json::class
    ];
    public function productAttribute()
    {
        return $this->belongsTo(ProductAttribute::class);
    }
}