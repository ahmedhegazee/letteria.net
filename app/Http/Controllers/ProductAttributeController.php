<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductAttribute;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductAttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        $title = "Product Attribute Index";
        $attributes = $product->attributes()->with('values')->paginate(10);
        return view('dashboard.product_attributes.index', \compact('attributes', 'title', 'product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
    {
        $title = "Add Product Attribute for " . $product->title['en'];
        return view('dashboard.product_attributes.create', \compact('title', 'product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Product $product, Request $request)
    {
        // dd($request->values);
        $rules = [
            'name' => "required|array",
            'name.*' => "required|string|min:3|max:191",
            'type' => "required|string|in:text,radio,dropdown",
            'price' => 'required|numeric',
            'limit_chars' => 'required_if:type,text|nullable|integer|min:0|max:100',
            'required' => 'required|integer|in:0,1',
            'values' => 'required_if:type,radio,dropdown|array',
            'values.*' => 'required|array',
            'values.*.en' => "required|string|min:3|max:191",
            'values.*.ar' => "required|string|min:3|max:191",
            'values.*.price' => "required|numeric|min:0",
        ];
        $this->validate($request, $rules);
        if (is_null($request->limit_chars)) {
            $request->merge(['limit_chars' => 0]);
        }

        $attribute = $product->attributes()->create($request->all());
        if ($request->has('values')) {
            $values = collect($request->values)->map(function ($value) use ($attribute) {
                $price = $value['price'];
                unset($value['price']);
                return ['value' => \json_encode($value), 'product_attribute_id' => $attribute->id, 'price' => $price];
            })->toArray();

            $attribute->values()->insert($values);
        }

        return \redirect(route('admin.attribute.index', $product->id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product, ProductAttribute $attribute)
    {
        $attribute->load('values');
        $title = "Edit Product Attribute for " . $product->title['en'];
        return view('dashboard.product_attributes.edit', \compact('title', 'attribute', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product, ProductAttribute $attribute)
    {
        $rules = [
            'name' => "required|array",
            'name.*' => "required|string|min:3|max:191",
            'type' => "required|string|in:text,radio,dropdown",
            'price' => 'required|numeric',
            'limit_chars' => 'required_if:type,text|nullable|integer|min:0|max:100',
            'required' => 'required|integer|in:0,1',
            'values' => 'required_if:type,radio,dropdown|array',
            'values.*' => 'required|array',
            'values.*.en' => "required|string|min:3|max:191",
            'values.*.ar' => "required|string|min:3|max:191",
            'values.*.price' => "required|numeric|min:0",
        ];

        $this->validate($request, $rules);
        if (is_null($request->limit_chars)) {
            $request->merge(['limit_chars' => 0]);
        }
        $attribute->update($request->all());
        if ($request->has('values')) {
            $attribute->values()->delete();
            $values = collect($request->values)->map(function ($value) use ($attribute) {
                $price = $value['price'];
                unset($value['price']);
                return ['value' => \json_encode($value), 'product_attribute_id' => $attribute->id, 'price' => $price];
            })->toArray();

            $attribute->values()->insert($values);
        }
        return \redirect(route('admin.attribute.index', $product->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, ProductAttribute $attribute)
    {
        $attribute->delete();
        return \back();
    }
}