<?php

use App\Http\Controllers\GalleryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SettingsController;
use App\Models\HomeSettings;


use Illuminate\Support\Facades\Route;

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

Route::get('/', [ProductsController::class,'main'])->name('main');
Route::get('/details/{id}', [ProductsController::class,'details'])->name('details');
Route::post('/product/order', [ProductsController::class,'order'])->name('order');
Route::resource('/review', ReviewController::class);
Route::get('/review/order_sn/{order_sn}/pid/{product_id}/create',[ReviewController::class,'create']);
Route::post('/review/confirmOrderSn',[ReviewController::class,'confirmOrderSn']);
Route::post('/review/save',[ReviewController::class,'save']);


Route::get('/about', function () {
    $summaries = HomeSettings::where('key','summary')->get();
    $missions = HomeSettings::where('key','mission')->get();
    // dd($missions);
    $visions = HomeSettings::where('key','vision')->get();
    return view('nafs.about',['summaries'=>$summaries
    ,'missions'=>$missions,'visions'=>$visions]);
})->name('about');

Route::get('/contact', function () {
    return view('nafs.contact');
})->name('contact');

Route::prefix('/dashboard')->group(function () {
    Route::get('/', function () {
            return view('dashboard');
        })->middleware(['auth', 'verified'])->name('dashboard');
    Route::middleware('auth')->group(function () {
        Route::resource('/products', ProductsController::class);
        Route::get('/product/create', [ProductsController::class,'create']);
        Route::get('/product/descriptiondelete', [ProductsController::class,'descriptiondelete']);

        Route::resource('/orders', OrderController::class);
        Route::post('/order/cancel/{id}', [OrderController::class,'cancel']);


        Route::resource('/gallery', GalleryController::class);
        Route::get('/gallery/create', [GalleryController::class,'create']);

         //Settings
      Route::resource('/settings',SettingsController::class);
      Route::post('/settings/change', [SettingsController::class,'change']);
    //   Route::get('/settings/timeslotdelete/{id}', [SettingsController::class,'timeslotdelete']);
      Route::get('/settings/summarydelete/{id}', [SettingsController::class,'summarydelete']);
        
        // Route::get('/edit', [ProductsController::class,'edit']);
        // Route::get('/delete', [ProductsController::class,'delete']);

        //Reviews
      Route::resource('/reviews',ReviewController::class);
      Route::get('/reviews/showorder/{order_id}',[ReviewController::class,'showorder']);
    });    

});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
