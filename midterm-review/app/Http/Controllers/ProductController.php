<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only(['createProduct', 'createProductForm', 'updateProductForm', 'updateProductPost', 'deleteProduct', 'restoreProduct']);
    }

    public function createProductForm()
    {
        return view('products.createProduct');
    }


    public function createProduct(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
        ]);

        $product = Product::create([
            'name' => $validated['name'],
            'description' => $validated['description'] ?? null,
            'price' => $validated['price'],
        ]);

        return view('products.created', ['product' => $product]);
    }

    public function listProducts()
    {
        $products = Product::all();

        return view('products.productsList', compact('products'));
    }

    public function restoreProduct($id)
    {
        $product = Product::withTrashed()->findOrFail($id);
        if ($product->trashed()) {
            $product->restore();
            return redirect()->route('products.list')->with('successMessage', 'Product restored successfully.');
        }
        return redirect()->route('products.list')->with('infoMessage', 'Product is not deleted.');
    }

    public function updateProductForm($id)
    {
        $product = Product::findOrFail($id);
        return view('products.updateProduct', compact('product'));
    }

    public function updateProductPost(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
        ]);

        $product->name = $validated['name'];
        $product->description = $validated['description'];
        $product->price = $validated['price'];
        $product->save();

        return redirect()->route('products.list')->with('successMessage', 'Product updated successfully.');
    }

    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.list')->with('successMessage', 'Product deleted successfully.');
    }


    public function adultPage()
    {
        return view('adultPage');
    }

    public function adminDashboard()
    {
        return view('adminDashboard');
    }
}
