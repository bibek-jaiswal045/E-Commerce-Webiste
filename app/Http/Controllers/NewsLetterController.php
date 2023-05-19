<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Exception;
use Illuminate\Validation\ValidationException;

use Illuminate\Http\Request;

class NewsLetterController extends Controller
{
    public function __invoke(Newsletter $newsletter)
    {
       
    request()->validate(['email' => 'required|email']);
   
    try{
        // $newsletter = new Newsletter();

        $newsletter->subscribe(request('email'));
        
    } catch(Exception $e){
        throw ValidationException::withMessages([
            'email' => 'This email could not be added to our newsletter list.',
        ]);
    }

    // print_r($response);
    return redirect()->route('homepage')->with('success', 'You are now signed up for our newsletter.');

    }
}
