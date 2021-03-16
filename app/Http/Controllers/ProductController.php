<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Product Index";
        $products = Product::with('category')->paginate(10);
        return view('dashboard.products.index', \compact('products', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Add Product";
        $attributes = ProductAttribute::with('values')->get();
        $categories = ProductCategory::all(['name', 'id']);
        return view('dashboard.products.create', \compact('title', 'categories', 'attributes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => "required|array",
            'title.*' => "required|string|min:3|max:191",
            'price' => 'required|numeric',
            'image' => 'required|file|mimes:jpg,png|max:20480',
            'product_category_id' => 'required|integer',
        ];
        $this->validate($request, $rules);
        $slug = Str::slug($request->title[config('langs')[0]]);
        $image_src = $request->file('image')->store('products', ['disk' => 'public']);
        $request->merge(['slug' => $slug, 'image_src' => $image_src]);
        Product::create($request->all());
        return \redirect(route('admin.product.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $title = "Edit Product";
        $categories = ProductCategory::all(['name', 'id']);
        return view('dashboard.products.edit', \compact('title', 'product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $rules = [
            'title' => "required|array",
            'title.*' => "required|string|min:3|max:191",
            'price' => 'required|numeric',
            'image' => 'sometimes|file|mimes:jpg,png|max:20480',
            'product_category_id' => 'required|integer',
        ];
        $this->validate($request, $rules);
        $slug = Str::slug($request->title[config('langs')[0]]);
        if ($request->has('image')) {
            $image_src = $request->file('image')->store('products', ['disk' => 'public']);
            $request->merge(['image_src' => $image_src]);
        }
        $request->merge(['slug' => $slug]);
        $product->update($request->all());
        return \redirect(route('admin.product.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        unlink($product->image_src);
        $product->delete();
        return \back();
    }
}