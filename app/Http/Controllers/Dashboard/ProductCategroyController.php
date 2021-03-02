<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductCategroyController extends Controller
{
    public function index()
    {
        $title = "Product Category Index";
        $categories = ProductCategory::paginate(10);
        return view('dashboard.product_category.index', \compact('categories', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Add Product Category";
        return view('dashboard.product_category.create', \compact('title'));
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
            'name' => "required|array",
            'name.*' => "required|string|min:3|max:191",
            'content' => "required|array",
            'content.*' => "required|string|min:3|max:191",
        ];
        $this->validate($request, $rules);
        $slug = Str::slug($request->name[config('langs')[0]]);
        $request->merge(['slug' => $slug]);
        ProductCategory::create($request->all());
        return \redirect(route('admin.category.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductCategory $category)
    {
        $title = "Edit Product Category";
        return view('dashboard.product_category.edit', \compact('title', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductCategory $category)
    {
        $rules = [
            'name' => "required|array",
            'name.*' => "required|string|min:3|max:191",
            'content' => "required|array",
            'content.*' => "required|string|min:3|max:191",
        ];
        $this->validate($request, $rules);
        $slug = Str::slug($request->name[config('langs')[0]]);
        $request->merge(['slug' => $slug]);
        $category->update($request->all());
        return \redirect(route('admin.category.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductCategory $category)
    {
        $category->delete();
        return \back();
    }
}