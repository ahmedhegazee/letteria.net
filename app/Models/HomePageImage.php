<?php

namespace App\Models;

use App\Casts\Json;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomePageImage extends Model
{
    use HasFactory;
    protected $fillable = ["image_src", "title", "sub_title"];
    protected $casts = [
        'title' => Json::class,
        'sub_title' => Json::class,
    ];
}