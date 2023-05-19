<?php

namespace App\Http\Controllers;
use App\Models\ProductComment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ProductCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = ProductComment::all();

        return view('clientside.details', ['productcomment'=> $comments]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clientside.details');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        $validated = request()->validate([
            'user_id' => 'required|integer',
            'product_id' => 'required|integer',
            'comment' => 'required|min:5|max:200',
        ]);

            ProductComment::create([
            'user_id' => $validated['user_id'], 
            'product_id' => $validated['product_id'],
            'comment' => $validated['comment'], 
        ]);

        return back()->with('success', 'Your review has been added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductComment $comment)
    {
        $comment->delete();
        return redirect()->route('clientindex');
    }
}
