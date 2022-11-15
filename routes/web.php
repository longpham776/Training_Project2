<?php

use App\Http\Controllers\SolrController;
use Illuminate\Support\Facades\Route;

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

Route::group(['namespace' => 'App\Http\Controllers'],function () {

    Route::get('/', 'SearchController@index')->name('search-page');

    Route::resource('solrs', SolrController::class)->except([
        'create', 'edit'
    ]);

    // Route::resource('searchs', SearchController::class)->except([
    //     'create', 'store', 'edit', 'update', 'destroy'
    // ]);
});
