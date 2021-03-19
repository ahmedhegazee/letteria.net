<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class ProductImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        $title = "Product Images for " . $product->title['en'];
        $images = $product->images()->paginate(10);
        return view('dashboard.product_images.index', \compact('images', 'title', 'product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
    {
        $title = "Add Product Images for " . $product->title['en'];
        return view('dashboard.product_images.create', \compact('title', 'product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Product $product, Request $request)
    {


        $rules = [
            'images' => 'required|array',
            'images.*' => 'required|image|max:20480'
        ];
        $this->validate($request, $rules);
        $paths = [];
        foreach ($request->images as $image) {
            $paths[] = ["src" => "storage/" . $image->store('product_imagesa', ['disk' => 'public']), 'product_id' => $product->id];
        }
        ProductImage::insert($paths);

        return \redirect(route('admin.image.index', $product->id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product, ProductImage $image)
    {
        $title = "Edit Product Image for " . $product->title['en'];
        return view('dashboard.product_images.edit', \compact('title', 'image', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product, ProductImage $image)
    {
        $rules = [
            'image' => "required|image|max:20480",
        ];

        $this->validate($request, $rules);
        \unlink($image->src);
        $imageLink = $request->image->store('product_images', ['disk' => 'public']);
        $image->src = "storage/" . $imageLink;
        $image->save();
        return \redirect(route('admin.image.index', $product->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, ProductImage $image)
    {
        unlink($image->src);
        $image->delete();
        return \back();
    }
}