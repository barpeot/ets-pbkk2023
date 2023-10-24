<?php

use App\Models\Item;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProfileController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $allItems = Item::all();
    
    return view('dashboard', ['allItems'=>$allItems]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/profile', [ProfileController::class, 'logout'])->name('profile.logout');

    Route::post('/create-item', [ItemController::class, 'newItem']);
    Route::get('/edit-item/{item}', [ItemController::class, 'showEdit']);
    Route::put('/edit-item/{item}', [ItemController::class, 'updateItem']);
    Route::delete('/delete-item/{item}', [ItemController::class, 'deleteItem']);

});

require __DIR__.'/auth.php';
