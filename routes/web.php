<?php

use Illuminate\Support\Facades\Route;
use App\Exports\GiftsExport;
use App\Models\Gift;
use App\Models\GiveawayApplicant;
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

Route::get('/jatekosok', function () {
    $gamers = GiveawayApplicant::authenticated()->get();
    return view('draw.gamers', ['gamers' => $gamers]);
})->name('draw.gamers');

Route::get('nyertesek', function () {
    return Excel::download(new GiftsExport(), 'gifts.xlsx');
})->name('draw.export');

Route::get('nyertesek-torlese', function () {
    $records = Gift::all();

    foreach ($records as $record) {
        $record->application_id = null;
        $record->save();
    }

    return redirect()->route('draw.index');
})->name('draw.delete');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return redirect()->route('draw.index');
})->name('dashboard');
