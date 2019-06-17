<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.products.index', [
            'products' => Product::paginate(25)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:products,slug',
            'details' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'image' => 'required|file',
            'images' => 'required',
            'images.*' => 'file',
            'quantity' => 'required|numeric',
            'categories' => 'required'
        ]);
        $data = $request->only(['name', 'slug', 'details', 'price', 'description', 'featured', 'quantity']);
        $data['featured'] = $data['featured'] ?? 0;

        $image_path = 'img/products';
        $image_name = $request->file('image')->getClientOriginalName();
        $request->file('image')->move($image_path, $image_name);
        $data['image'] = $image_path . '/' . $image_name;

        foreach ($request->file('images') as $image) {
            $image->move($image_path, $image->getClientOriginalName());
            $image_names[] = $image_path . '/' . $image->getClientOriginalName();
        }
        $data['images'] = json_encode($image_names);
        $product = Product::create($data);

        $product->categories()->sync($request->categories);

        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $product->load('categories');
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:products,slug,' . $product->id,
            'details' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'quantity' => 'required|numeric',
            'categories' => 'required'
        ]);

        $data = $request->only(['name', 'slug', 'details', 'price', 'description', 'featured', 'quantity']);
        $data['featured'] = $data['featured'] ?? 0;

        $image_path = 'img/products';
        if ($request->hasFile('image')) {
            $image_name = $request->file('image')->getClientOriginalName();
            $request->file('image')->move($image_path, $image_name);
            $data['image'] = $image_path . '/' . $image_name;
        }

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $image->move($image_path, $image->getClientOriginalName());
                $image_names[] = $image_path . '/' . $image->getClientOriginalName();
            }
            $data['images'] = json_encode($image_names);
        }
        $product->update($data);

        $product->categories()->sync($request->categories);

        return redirect()->route('admin.products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return back();
    }
}
