<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\ProductComment;
use Illuminate\Http\Request;


class ClientController extends Controller
{
    public function index(){
        $products = Product::with('category')->get();
        return view('clientside.index', ['products' => $products]);
    }

    public function details(Product $product){
        $users = User::all();
        $productcomment = ProductComment::all();
        return view('clientside.details', ['product' => $product, 'productcomment' => $productcomment, 'users' => $users]);


    }

    public function buy(Product $product){
        
        
            return view('clientside.buy',['product' => $product]);
   
    }

    public function store(Request $request)
    {
        $product = Product::where('id', $request->product_id)->first();
        $validated = $request->validate([
            'product_id' => 'required|integer',
            'quantity' => 'required|integer|min:1|max:' . $product->in_stock

        ]);

        $cart = auth()->user()->carts()->create([
            'product_id' => $validated['product_id'],
            'quantity' => $validated['quantity']
        ]);


        $cart->product->update(['in_stock' => ($cart->product->in_stock) - ($request->quantity)]);

       
    

        return redirect()->back()->with('success', 'Product has been added to cart.');
    }

}

