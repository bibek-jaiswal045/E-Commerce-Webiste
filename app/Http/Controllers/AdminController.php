<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin(User $users){

        // if (User::where('isAdmin', '=', 1)->exists()) {
        //     return redirect()->route('register')->with($message = "You are not elligible to be an admin.");
            
            if(auth()->user()->isAdmin == 1){
                return view('products.index', ['user' => $users]);
            } else{
                return view('clientside.index', ['user' => $users]);
            }
            
        // }
    }
}
