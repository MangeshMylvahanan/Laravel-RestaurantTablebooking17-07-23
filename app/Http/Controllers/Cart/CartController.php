<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function AddToCart(Request $request)
    {
        $userId = Auth::user()->id;

        // Retrieve the array of product IDs
        $productIds = $request->input('product_id');
        // Retrieve the array of quantities
        $quantities = $request->input('qty');
        $orderId = $request->orderid;
        // Loop through the arrays and create a cart item for each product
        for ($i = 0; $i < count($productIds); $i++) {
            Cart::create([
                'order_id' =>$orderId ,
                'product_id' => $productIds[$i],
                'qty' => $quantities[$i],
                'user_id' => $userId,
            ]);
        }

        return redirect('/cart/' . $orderId);

    }

    public function Cart($id)
    {
        $cart = Cart::where('order_id', $id)->get();
        $userId = Auth::user()->id;
        $products = []; // Initialize an empty array to store the products

        foreach ($cart as $data) {
            $productid = $data->product_id;
            $product = DB::table('dishes')
                ->where('id', $productid)
                ->first(); // Use "first()" instead of "get()" since you're retrieving a single product

            if ($product) {
                $products[] = $product; // Add the product to the array
            }
        }

        return view('cart', compact('cart', 'products'));
    }
}
