<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductCommentController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\NewsLetterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductsCommentController;
use App\Http\Controllers\WelcomeController;
use App\Services\MailchimpNewsletter;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Validation\ValidationException;
use function GuzzleHttp\Promise\exception_for;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::post('newsletter', NewsLetterController::class);

Route::get('/', [WelcomeController::class, 'welcome'])->name('homepage')
// After the completion enable the line below
// ->middleware('guest')
;


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
  


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::
middleware('admin')->
prefix('products')->group(function(){
    
    Route::get('/', [ProductsController::class, 'index'])->name('indexproducts');
    
    Route::post('/', [ProductsController::class, 'store'])->name('storeproducts');
    
    Route::get('create', [ProductsController::class, 'create'])->name('createproducts');

    Route::put('product/{product}', [ProductsController::class, 'update'])->name('updateproducts');

    Route::get('product/edit/{product}', [ProductsController::class, 'edit'])->name('editproducts');
    
    Route::delete('product/{product}', [ProductsController::class, 'destroy'])->name('deleteproduct');

    Route::get('data', [ProductsController::class, 'data'])->name('dataproducts')->middleware('auth');

    Route::get('orderdetails/{user_id}',[ProductsController::class, 'order'] )->name('orderdetails');

    Route::get('productdetails/{product}', [ProductsController::class, 'detail'])->name('detailsellerproduct');
});

Route::

prefix('client')->group( function(){

    Route::get('/', [ClientController::class, 'index'])->name('clientindex');

    Route::get('details/{product}', [ClientController::class, 'details'])->name('detailproducts');

    Route::post('cart/add', [ClientController::class, 'store'])->name('cartAdd')->middleware('auth' );


    Route::get('buy/{product}', [ClientController::class, 'buy'])->name('buyproduct')->middleware('auth' );


});

Route::
middleware('admin')->
prefix('blog')->group(function(){

    Route::get('/', [BlogController::class, 'index'])->name('blogindex');

    Route::post('store', [BlogController::class, 'store'])->name('storeblog');

    Route::get('create', [BlogController::class, 'create'])->name('createblog');

    Route::put('{blog}', [BlogController::class, 'update'])->name('updateblog');

    Route::get('edit/{blog}', [BlogController::class, 'edit'])->name('editblog');

    Route::delete('{blog}', [BlogController::class, 'destroy'])->name('deleteblog');

    
});
// Removed from blogs group because blogs can be read by the unsigned or unauthorized people also.

Route::get('blog/detailblog/{blog}', [BlogController::class, 'detailblog'])->name('detailblog');

Route::prefix('categories')->group(function()
{
    Route::get('/', [CategoryController::class, 'index'])->name('categoryindex');

    Route::post('/', [CategoryController::class, 'store'])->name('storecategory');

    Route::get('/create', [CategoryController::class, 'create'])->name('createcategory');

    Route::put('{category}', [CategoryController::class, 'update'])->name('updatecategory');

    Route::get('edit/{category}', [CategoryController::class, 'edit'])->name('editcategory');

    Route::delete('{category}', [CategoryController::class, 'destroy'])->name('deletecategory');

    Route::get('{category}', [CategoryController::class, 'single_category'])->name('singlecategory');

});

Route::resource('comments', ProductCommentController::class)->middleware('auth');
// Route::resource('products/{product->id}/comments', ProductCommentController::class)->middleware('auth');
