<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;

class ProductsController extends Controller
{
    public function index()
    {

        $products = Product::with('category')->get();

        
        return view('products.index', ['products' => $products]);
    }


    public function create(){

        $categories = Category::all();
        return view('products.create',['categories' => $categories]);


    }

    public function store(){
        // $product = new Product;
    //    $product = 
       request()->validate([
            'name' => 'required|min:2|max:20',
            'category_id' => 'required|integer',
            'image' => 'required|mimes:png,jpg,jfif',
            'description' => 'required|min:10|max:150',
            'in_stock' => 'required|integer',
            'price' => 'required|integer'

        ]);

        
        $filename = null;
        if (request()->file('image')) {
            $file = request()->file('image');
            $filename = date('Ymdhi') . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
        }

        

        // $product = 
        Product::create([
            'name' => request('name'),
            'category_id' => request('category_id'),
            'image' => $filename,
            'description' => request('description'),
            'in_stock' => request('in_stock'),
            'price' => request('price'),
        
        
        ]);

        // Category::create([
        //     'name' => request('category'),
        //     'product_id' => $product->id,
        // ]);
       



        return redirect()->route('indexproducts');


    }


    public function edit(Product $product){
        $categories = Category::all();
        return view('products.edit', ['product' => $product, 'categories' => $categories]);
    }

    public function update(Product $product){
        request()->validate([
            // 'image' => 'required',
            'name' => 'required|min:2|max:20',
            'category_id' => 'required|integer',

            'description' => 'required|min:10|max:150',
            'in_stock' => 'required|integer',
            'price' => 'required|integer',

        ]);
        $filename = $product->image;
        if (request()->file('image')) {
            $file = request()->file('image');
            $filename = 'product' . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
        }

        $product->update([
            'image' => $filename,
            'category_id' => request('category_id'),
            'name' => request('name'),
            'description' => request('description'),
            'in_stock' => request('in_stock'),
            'price' => request('price'),



        ]);

        return redirect()->route('indexproducts');
    }




    public function destroy(Product $product){
        $product->delete();
        unlink('images/' . $product->image);
        return redirect()->route('indexproducts');

    }


    public function detail(Product $product){
        return view('products.details', ['product' => $product]);
    }

  

    public function data(){
        $users = User::all();
           return view('products.data', ['users'=>$users]);
         
    }


    public function order($user_id)
    {
            $user = User::where('id',$user_id)->firstorFail();
            return view('products.orderdetails', ['user'=>$user]);
        
    }
    


}
