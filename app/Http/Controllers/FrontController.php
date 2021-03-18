<?php

namespace App\Http\Controllers;

use App\Models\HomePageImage;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function getHomeImages()
    {
        $images = HomePageImage::all(["image_src", "title", "sub_title"]);
        return \response()->json(["images" => $images]);
    }
    public function getCategories()
    {
        $categories = ProductCategory::with('products')->get();
        return response()->json(["categories" => $categories]);
    }
    public function getCategoryProdcuts($slug)
    {
        $validator = \validator()->make(["slug" => $slug], ['slug' => 'rquired|string']);
        if ($validator->fails) {
            return \response()->json(['errors' => $validator->errors()->toArray()]);
        }
        $category = ProductCategory::where("slug", $slug)->with("products")->get();
        if (is_null($category)) {
            return \response()->json([], 404);
        }
        return response()->json(["category" => $category]);
    }
    public function getProductDetails($slug)
    {
        $validator = \validator()->make(["slug" => $slug], ['slug' => 'rquired|string']);
        if ($validator->fails) {
            return \response()->json(['errors' => $validator->errors()->toArray()]);
        }
        $product = Product::where("slug", $slug)->with(["attributes.values", "images"])->get();
        if (is_null($product)) {
            return \response()->json([], 404);
        }
        return response()->json(["product" => $product]);
    }
}