<?php declare(strict_types=1);

use App\Http\Controllers\Api\ActorInfoController;
use App\Http\Controllers\Api\CustomerListController;
use App\Http\Controllers\Api\FilmListController;
use App\Http\Controllers\Api\NicerButSlowerFilmListController;
use App\Http\Controllers\Api\StaffListController;
use App\Http\Controllers\Api\SalesByFilmCategoryController;
use App\Http\Controllers\Api\SalesByStoreController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/actor_info', [ActorInfoController::class, 'index']);
Route::get('/customer_list', [CustomerListController::class, 'index']);
Route::get('/film_list', [FilmListController::class, 'index']);
Route::get('/nicer_but_slower_film_list', [NicerButSlowerFilmListController::class, 'index']);
Route::get('/sales_by_film_category', [SalesByFilmCategoryController::class, 'index']);
Route::get('/sales_by_store', [SalesByStoreController::class, 'index']);
Route::get('/staff_list', [StaffListController::class, 'index']);
