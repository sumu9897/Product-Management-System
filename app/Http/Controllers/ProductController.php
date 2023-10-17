<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ProductController extends Controller
{
    public function all(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            // Search for products by name or ID
            $products = Product::where('name', 'like', '%' . $search . '%')
                ->orWhere('serial', $search)
                ->paginate(10);
        } else {
            // Retrieve all products
            $products = Product::paginate(10);
        }

        // Count all products
        $productCount = Product::count();

    // Count products with status 'disable'
    $disabledProductCount = Product::where('status', 'disable')->count();

    // Share the product count variables with all views
    View::share('productCount', $productCount);
    View::share('disabledProductCount', $disabledProductCount);

        return view('product.all', compact('products'));
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        $product = Product::create([
            'name' => $request->name,
            'id' => $request->id,
            //'serial' => rand(1000000, 9999999),
            'serial' => $request -> serial,
            'price' => $request->price,
            'model' => $request->model,
            'status' => $request->status,
            'document' => $request->document,
            'SBU' => $request->SBU,
            'capacity' => $request->capacity,
            'description' => $request->description,
            'Purchase_Date' => $request->Purchase_Date,
            'P_WG' => $request->P_WG,
        ]);

        return redirect()->back()->with('success', 'Product successfully stored.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $product->update([
            'name' => $request ->name,
            //'serial' => $request ->serial,
            //'serial' => rand(1000000, 9999999),
            'price' => $request ->price,
            'model' => $request ->model,
            'status' => $request ->status,
            'document' => $request ->document,
            'SBU' => $request ->SBU,
            'capacity' => $request ->capacity,
            'description' => $request ->description,
            'Purchase_Date' => $request ->Purchase_Date,
            'P_WG' => $request ->P_WG,
        ]);

        return redirect()->back()->with('success', 'Product successfully updated.');
    }

    public function view()
    {
        $product = Products::with('assign')->get(); 
        $assign = Assign::with('products')->get();
        return view ('product.view')-> with([
            'products' => $product,
            'assign' => $assign,
        ]);
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->back()->with('success', 'Product successfully deleted.');
    }
}
