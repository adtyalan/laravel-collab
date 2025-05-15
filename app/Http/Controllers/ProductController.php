<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\returnValue;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        // Menggunakan Scope
        $expensiveProducts = Product::expensive()->get();

        // Mengunakan query Builder
        $averagePrice = Product::averagePrice();


        // $expensiveProducts = Product::where('price', '>', 1000000)->orderBy('price', 'desc')->get();

        // $averagePrice = DB::table('products')->avg('price');

        return view('products.index', compact('products', 'expensiveProducts', 'averagePrice'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function create()
    {
        return view('products.create');
    }

    // Store Products
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer'
        ]);

        Product::create($request->all());

        return redirect('/products')->with('success', 'Product added successfully!');
    }

    // Edit Products
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));    
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer'
        ]);
        
        $product = Product::findOrFail($id);
        $product->update($request->all());

        return redirect('/products')->with('success', 'Product updated successfully!');
    }

    // Delete Products
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        
        return redirect('/products')->with('success', 'Product deleted successfully!');
    }

}
