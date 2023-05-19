<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use GuzzleHttp\RedirectMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('category.index', ['categories' => $categories]);
    }

    public function create(){
        return view('category.create');
    }

    public function store(){
        request()->validate([
            'name' => 'required|min:3|max:10',
            // 'product_id' => 'required|integer',
        ]);

        Category::create([
            'name' => request('name'),
            // 'product_id' => request('product_id'),
        ]);

        return redirect()->route('categoryindex');

    }

    public function edit(Category $category)
    {
        return view('category.edit', ['category' => $category]);
    }

    public function update(Category $category)
    {
        request()->validate([
            'name' => 'required|min:3|max:10|',
        ]);

        $category->update([
            'name' => request('name'),
        ]);

        return redirect()->route('categoryindex');
        
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categoryindex');
    }

   

    // public function individual(Category $category)
    public function single_category($category_id)
    {
        // $product = DB::table('products')->whereId($category_id)->get();

        $category = Category::where('id', $category_id)->get();
        // $product = DB::table('products')->whereId($category_id)->get();
       
        return view('category.single', [ 'category' => $category]);
    }
}
