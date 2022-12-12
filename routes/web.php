<?php

use Illuminate\Support\Facades\Route;
use App\Exports\GiftsExport;
use Maatwebsite\Excel\Facades\Excel;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sorsolas', function () {
    return view('draw.index');
})->name('draw.index');

Route::get('nyertesek', function () {
    return Excel::download(new GiftsExport, 'gifts.xlsx');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
