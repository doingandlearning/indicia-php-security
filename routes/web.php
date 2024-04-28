<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ShopItemController;
use App\Http\Controllers\StaticFileController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\SQLDemoController;
use App\Http\Controllers\SQLiDemoController;


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
Route::get('/day1/challenge2', function () {
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


Route::get('/day2/headers', function () {
    return view('day2.headers');
})->name('day2.headers');

Route::get('/css/{filename}', [StaticFileController::class, 'getCss'])->where('filename', '[a-zA-Z0-9\\-\\.]+\\.css');

Route::get('/day2/login', function () {
    return view('day2.login');
});

Route::get("/day2", function () {
    return view("day2.outline");
})->name("day2");

Route::get("/day2/headers-exercise", function () {
    return view("day2.headers-exercise");
})->name("day2.headers-exercise");

Route::get("/day2/headers", function () {
    return view("day2.headers");
})->name("day2.headers");



Route::get("/day2/sqli-exercise", function () {
    return view("day2.sql-exercise");
})->name("day2.sqli-exercise");
Route::post('/day2/login', [LoginController::class, 'login']);
Route::get('/day2/search', [MemberController::class, 'search'])->name('search');
Route::get('/day2/error-sql', [SQLDemoController::class, 'index'])->name('error-sql');
Route::get('/day2/vulnerable-query', [SQLiDemoController::class, 'vulnerableQuery'])->name('vulnerable-query');
Route::get('/day2/vulnerable-raw', [SQLiDemoController::class, 'vulnerableRawMethod'])->name('vulnerable-raw-method');


Route::get("/day3", function () {
    return view("day3.outline");
})->name("day3");

Route::get("/day3/gdpr", function () {
    return view("day3.gdpr");
})->name("day3.gdpr");


Route::Get("/day3/cookies", function () {
    return view("day3.cookies");
})->name("day3.cookies");
