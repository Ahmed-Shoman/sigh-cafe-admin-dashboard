<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\HeroSectionController;
use App\Http\Controllers\Api\MemorySectionController;
use App\Http\Controllers\Api\ProductSectionController;
use App\Http\Controllers\Api\PreparationProcessController;
use App\Http\Controllers\Api\StatisticSectionController;
use App\Http\Controllers\Api\StoryArticleSectionController;
use App\Http\Controllers\Api\OpinionSectionController;
use App\Http\Controllers\Api\EmiratiCoffeeCultureSectionController;








/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
use App\Http\Controllers\Api\SettingController;

Route::get('/settings', [SettingController::class, 'index']);

Route::get('/hero', [HeroSectionController::class, 'index']);
Route::post('/hero', [HeroSectionController::class, 'store']);
Route::put('/hero/{id}', [HeroSectionController::class, 'update']);


Route::get('/memories', [MemorySectionController::class, 'index']);
Route::post('/memories', [MemorySectionController::class, 'store']);
Route::put('/memories/{id}', [MemorySectionController::class, 'update']);


Route::get('/products-section', [ProductSectionController::class, 'index']);
Route::post('/products-section', [ProductSectionController::class, 'store']);
Route::put('/products-section/{id}', [ProductSectionController::class, 'update']);


Route::get('/preparation-process', [PreparationProcessController::class, 'index']);
Route::post('/preparation-process', [PreparationProcessController::class, 'store']);
Route::put('/preparation-process/{id}', [PreparationProcessController::class, 'update']);


Route::get('/statistics', [StatisticSectionController::class, 'index']);
Route::post('/statistics', [StatisticSectionController::class, 'store']);
Route::put('/statistics/{id}', [StatisticSectionController::class, 'update']);


Route::get('/stories-articles', [StoryArticleSectionController::class, 'index']);
Route::post('/stories-articles', [StoryArticleSectionController::class, 'store']);
Route::put('/stories-articles/{id}', [StoryArticleSectionController::class, 'update']);


Route::get('/opinions', [OpinionSectionController::class, 'index']);
Route::post('/opinions', [OpinionSectionController::class, 'store']);
Route::put('/opinions/{id}', [OpinionSectionController::class, 'update']);



Route::get('/emirati-coffee-culture', [EmiratiCoffeeCultureSectionController::class, 'index']);
Route::post('/emirati-coffee-culture', [EmiratiCoffeeCultureSectionController::class, 'store']);
Route::put('/emirati-coffee-culture/{id}', [EmiratiCoffeeCultureSectionController::class, 'update']);