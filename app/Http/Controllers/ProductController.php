<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $query = Product::query();

        // Search by ID, Name, or Price
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('id', 'like', "%{$search}%")
                  ->orWhere('name', 'like', "%{$search}%")
                  ->orWhere('price', 'like', "%{$search}%");
        }
    
        $products = Product::take(20)->paginate(5);
        return view('products.index', compact('products'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
        // return view('products.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        //validation
        $request->validate(
            [
                'name' => 'required',
                'price' => 'required',
                'stock' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]
        );


        $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
        $request->image->move(public_path('products/'), $imageName);
        $product = new Product;
        $product->image = $imageName;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->save();
        return view('products.index')->withSuccess('Product Has been added');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::where('id', $id)->first();
        dd($product);
        return view('products.show', ['product' => $product]);    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::where('id', $id)->first();
        return view('products.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $request->validate(
            [
                'name' => 'required',
                'price' => 'required',
                'stock' => 'required',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:9999',
            ]
        );

        $product = Product::where('id', $id)->first();
        if (isset($request->image)) {
            //if image updated then execute
            $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->image->move(public_path('products/'), $imageName);
            $product->image = $imageName;

        }
        ;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->save();
        return view('products.index')->withSuccess('Product Has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return view('products.index')->withSuccess('Product Has been Deleted');
    }
}
