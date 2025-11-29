<?php

// use App\Http\Controllers\Api\CmsController;
// use Illuminate\Support\Facades\Route;

// Route::group(function () {
//     // CMS Pages API Routes
//     Route::get('cms-pages', [CmsController::class, 'index']);
//     Route::get('cms-pages/{id}', [CmsController::class, 'show']);
//     Route::get('cms-pages/url/{url_key}', [CmsController::class, 'showByUrlKey']);
// });


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomController;

Route::get('abcd', [CustomController::class, 'index']);

Route::get('versions', [CustomController::class, 'versions']);
Route::get('slider_images', [CustomController::class, 'slider_images']);
Route::get('custom_pages', [CustomController::class, 'custom_pages']);
Route::get('related_product', [CustomController::class, 'related_product']);