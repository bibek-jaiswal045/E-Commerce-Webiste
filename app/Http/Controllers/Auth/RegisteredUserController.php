<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'isAdmin' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        if (User::where('isAdmin', 1)->exists() && ($request->isAdmin == 1))
        {
            return redirect()->route('clientindex')->with('warning','You are not allegible to be admin');
            
        }else{
                $user = User::create([
                
                'name' => $request->name,
                'isAdmin' => $request->boolean('isAdmin'),
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
        }
        
            event(new Registered($user));
            Auth::login($user);
            if($user->isAdmin != 1){

                return redirect(RouteServiceProvider::HOMECL);
            }else{
        
                return redirect(RouteServiceProvider::HOMEAD);
     
            }

    }
}
