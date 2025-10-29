<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ProductController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth')->only(['createProduct', 'createProductForm', 'updateProductForm', 'updateProductPost', 'deleteProduct', 'restoreProduct']);
    // }

    public function createProductForm()
    {
        return view('products.createProduct');
    }

    public function getAllProducts()
    {
        $products = Product::all();
        return response()->json($products);
    }

    public function createProduct(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
        ]);

        $user = auth()->user();

        $product = Product::create([
            'name' => $validated['name'],
            'description' => $validated['description'] ?? null,
            'price' => $validated['price'],
            'user_id' => $user->id,
        ]);

        return view('products.created', ['product' => $product]);
    }

    public function listProducts()
    {
        $products = Product::paginate(10);

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

        // if (Gate::denies('edit-product', $product)) {
        //     abort(403);
        // }

        Gate::authorize('edit-product', $product);

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
