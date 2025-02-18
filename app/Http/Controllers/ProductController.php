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
        $products = Product::take(20)->paginate(10);
        return view('products.index', compact('products'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
        //this should work as we are creating products and we do not need to pass products here.
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
        $request->image->move(public_path('products'), $imageName);
        $product = new Product;
        // dd(public_path('products/' . $product->image));
        $product->image = $imageName;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->save();
        return redirect()->route('products.index')->withSuccess('New Product Has been Added');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }




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
         $request->validate(
             [
                 'name' => 'required',
                 'price' => 'required',
                 'stock' => 'required',
                 'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:9999',
             ]
         );
     
         $product = Product::where('id', $id)->first();
     
         if ($request->hasFile('image')) {
             // Delete old image if it exists
             if ($product->image && file_exists(public_path('products/' . $product->image))) {
                 unlink(public_path('products/' . $product->image));
             }
     
             // Upload new image
             $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
             $request->image->move(public_path('products'), $imageName);
             $product->image = $imageName;
         }
     
         $product->name = $request->name;
         $product->description = $request->description;
         $product->price = $request->price;
         $product->stock = $request->stock;
         $product->save();
     
         return redirect()->route('products.index')->withSuccess('Product Has been Updated');
     }
//previous update method

    //  public function update(Request $request, string $id)
    // {
    //     // dd($request->all());
    //     $request->validate(
    //         [
    //             'name' => 'required',
    //             'price' => 'required',
    //             'stock' => 'required',
    //             'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:9999',
    //         ]
    //     );

    //     $product = Product::where('id', $id)->first();
    //     if (isset($request->image)) {
    //         //if image updated then execute
    //         $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
    //         $request->image->move(public_path('products'), $imageName);
    //         $product->image = $imageName;
    //     }

    //     $product->name = $request->name;
    //     $product->description = $request->description;
    //     $product->price = $request->price;
    //     $product->stock = $request->stock;
    //     $product->save();
    //     return redirect()->route('products.index')->withSuccess('Product Has been Updated');
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index')->withSuccess('Product Has been Deleted');
    }
}
