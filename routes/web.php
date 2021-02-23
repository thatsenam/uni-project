<?php

use App\Http\Controllers\AssetCategoriesController;
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

Route::get('/', 'PagesController@index');


// Demo routes
Route::get('/datatables', 'PagesController@datatables');
Route::get('/ktdatatables', 'PagesController@ktDatatables');
Route::get('/select2', 'PagesController@select2');
Route::get('/test', 'PagesController@test');
Route::get('/jquerymask', 'PagesController@jQueryMask');
Route::get('/icons/custom-icons', 'PagesController@customIcons');
Route::get('/icons/flaticon', 'PagesController@flaticon');
Route::get('/icons/fontawesome', 'PagesController@fontawesome');
Route::get('/icons/lineawesome', 'PagesController@lineawesome');
Route::get('/icons/socicons', 'PagesController@socicons');
Route::get('/icons/svg', 'PagesController@svg');

// Quick search dummy route to display html elements in search dropdown (header search)
Route::get('/quick-search', 'PagesController@quickSearch')->name('quick-search');




Route::group([
    'prefix' => 'asset_categories',
], function () {

    Route::get('/', [AssetCategoriesController::class,'index'])->name('asset_categories.asset_category.index');
    Route::get('/create',[AssetCategoriesController::class,'create'])->name('asset_categories.asset_category.create');
    Route::get('/show/{assetCategory}',[AssetCategoriesController::class,'show'])->name('asset_categories.asset_category.show')->where('id', '[0-9]+');
    Route::get('/{assetCategory}/edit',[AssetCategoriesController::class,'edit'])->name('asset_categories.asset_category.edit')->where('id', '[0-9]+');
    Route::post('/', [AssetCategoriesController::class,'store'])->name('asset_categories.asset_category.store');
    Route::put('asset_category/{assetCategory}', [AssetCategoriesController::class,'update'])->name('asset_categories.asset_category.update')->where('id', '[0-9]+');
    Route::delete('/asset_category/{assetCategory}',[AssetCategoriesController::class,'destroy'])->name('asset_categories.asset_category.destroy')->where('id', '[0-9]+');

});
