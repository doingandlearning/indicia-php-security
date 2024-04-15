<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ShopItemController;
use App\Http\Controllers\ValidationController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/day1', function () {
    return view('day1');
});

Route::get('/day1/warmup', function () {
    return view('day1.warmup');
})->name('day1.warmup');

Route::get('/day1/challenge1', function () {
    return view('day1.challenge1');
})->name('day1.challenge1');
Route::match(['get', 'post'], '/day1/challenge2', function () {
    return view('day1.challenge2');
})->name('day1.challenge2');
Route::match(['get', 'post'], '/day1/challenge3', function () {
    return view('day1.challenge3');
})->name('day1.challenge3');
Route::match(['get', 'post'], '/day1/challenge4', function () {
    return view('day1.challenge4');
})->name('day1.challenge4');
Route::match(['get', 'post'], '/day1/challenge5', function () {
    return view('day1.challenge5');
})->name('day1.challenge5');
Route::match(['get', 'post'], '/day1/challenge6', function () {
    return view('day1.challenge6');
})->name('day1.challenge6');


Route::get('/shop', [ShopItemController::class, 'index'])->name('shop.index');
Route::get('/shop/create', [ShopItemController::class, 'create'])->name('shop.create');
Route::post('/shop', [ShopItemController::class, 'store'])->name('shop.store');
Route::get('/shop/{item}', [ShopItemController::class, 'show'])->name('shop.show');
Route::delete('/shop/{item}', [ShopItemController::class, 'destroy'])->name('shop.destroy');

Route::get('/day1/dom-xss', function () {
    return view('day1.dom-xss');
})->name('day1.dom-xss');
Route::match(['get', 'post'], '/day1/input-validation', function () {
    return view('day1.input-validation');
})->name('day1.input-validation');


Route::match(['get', 'post'], '/day1/buy', function () {
    return view('day1.buy');
})->name('day1.buy');


Route::get('/day1/form-validation', [ValidationController::class, 'showForm'])->name('day1.form-validation');
Route::post('/day1/form-validation', [ValidationController::class, 'submitForm'])->name('day1.form-validation');