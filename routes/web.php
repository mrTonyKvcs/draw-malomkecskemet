<?php

use Illuminate\Support\Facades\Route;
use App\Exports\GiftsExport;
use App\Models\Gift;
use App\Models\GiveawayApplicant;
use Illuminate\Support\Facades\DB;
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
    return redirect()->route('draw.index');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('/kosarlabda-kihivas', function () {
        return view('basketball-game.index');
    })->name('basketball-game.index');
});

Route::middleware(['check.email', 'auth:sanctum', 'verified'])->group(function () {
    //Draw
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
            $record->secondary_application_id = null;
            $record->save();
        }

        return redirect()->route('draw.index');
    })->name('draw.delete');

    // Gift Packages Draw
    Route::get('/ajandekcsomag/sorsolas', function () {
        return redirect()->route('draw.index');
        return view('draw.GiftPackage.index');
    })->name('draw.GiftPackage.index');

    Route::get('/ajandekcsomag/jatekosok', function () {
        $gamers = GiveawayApplicant::authenticated()
            ->get();

        $grouped = $gamers->groupBy('giveaway_name');

        return view('draw.GiftPackage.gamers', ['gifts' => $grouped]);
    })->name('draw.GiftPackage.gamers');

    Route::get('/ajandekcsomag/nyertesek-torlese', function () {
        $records = Gift::all();

        foreach ($records as $record) {
            $record->application_id = null;
            $record->secondary_application_id = null;
            $record->save();
        }

        return redirect()->route('draw.GiftPackage.index');
    })->name('draw.GiftPackage.delete');
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return redirect()->route('draw.index');
})->name('dashboard');
