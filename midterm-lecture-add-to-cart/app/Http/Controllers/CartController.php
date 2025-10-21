<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;


class CartController extends Controller
{
    public function viewCart()
    {
        $user = auth()->user();
        // $cartItems = $user->carts()->with('product')->get();
        $cartItems = Cart::where('user_id', $user->id)->with('product')->get();


        return view('cart.view', compact('cartItems'));
    }

    public function addToCart($productId)
    {
        $user = auth()->user();
        $product = Product::findOrFail($productId);

        $existingCartItem = Cart::where('user_id', $user->id)
                                ->where('product_id', $product->id)
                                ->first();

        if ($existingCartItem) {
            $existingCartItem->quantity += 1;
            $existingCartItem->save();
            return redirect()->route('products.list')->with('successMessage', 'Product quantity updated in cart successfully.');
        }
        $cart = Cart::create([
            'user_id' => $user->id,
            'product_id' => $product->id,
            'quantity' => 1,
        ]);


        return redirect()->route('products.list')->with('successMessage', 'Product added to cart successfully.');
    }


}
