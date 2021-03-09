<?php

namespace App\Http\Controllers;

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
    public function index()
    {
        $title = "Product Attribute Index";
        $attributes = ProductAttribute::with('values')->paginate(10);
        return view('dashboard.product_attributes.index', \compact('attributes', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Add Product Attribute";
        return view('dashboard.product_attributes.create', \compact('title'));
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
            'type' => "required|string|in:text,radio,dropdown",
            'price' => 'required|numeric',
            'limit_chars' => 'required_if:type,text|nullable|integer|min:0|max:100',
            'required' => 'required|integer|in:0,1',
            'values' => 'required_if:type,radio,dropdown|array',
            'values.*' => 'required|array',
            'values.*.en' => "required|string|min:3|max:191",
            'values.*.ar' => "required|string|min:3|max:191",
        ];
        $this->validate($request, $rules);
        if (is_null($request->limit_chars)) {
            $request->merge(['limit_chars' => 0]);
        }
        $attribute = ProductAttribute::create($request->all());
        if ($request->has('values')) {
            $values = collect($request->values)->map(function ($value) use ($attribute) {
                return ['value' => \json_encode($value), 'product_attribute_id' => $attribute->id];
            })->toArray();

            $attribute->values()->insert($values);
        }

        return \redirect(route('admin.attribute.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductAttribute $attribute)
    {
        $attribute->load('values');
        $title = "Edit Product Attribute";
        return view('dashboard.product_attributes.edit', \compact('title', 'attribute'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductAttribute $attribute)
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
        ];

        $this->validate($request, $rules);
        if (is_null($request->limit_chars)) {
            $request->merge(['limit_chars' => 0]);
        }
        $attribute->update($request->all());
        if ($request->has('values')) {
            $attribute->values()->delete();
            $values = collect($request->values)->map(function ($value) use ($attribute) {
                return ['value' => \json_encode($value), 'product_attribute_id' => $attribute->id];
            })->toArray();

            $attribute->values()->insert($values);
        }
        return \redirect(route('admin.attribute.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductAttribute $attribute)
    {
        $attribute->delete();
        return \back();
    }
}