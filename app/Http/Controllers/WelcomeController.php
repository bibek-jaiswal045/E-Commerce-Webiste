<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Blog;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    public function welcome(){
          $category = Category::all();
        // $products = Product::latest()->take(4)->get();
        // $products = Product::latest();
        $products = Product::latest()->with('category')->filter(request(['search']))->paginate(4)->withQueryString();

        $blogs = Blog::latest()->take(4)->get();

      

        // if(request('search')){
            
        //     $products->where('name','like', '%'. request('search') . '%');
        // }

        // return view('welcome',['products' =>$products->get(), 'blogs' => $blogs, 'category' => $category]);
        return view('welcome',['products' =>$products, 'blogs' => $blogs, 'category' => $category]);


    }
    
}
