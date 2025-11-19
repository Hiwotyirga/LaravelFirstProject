<?php

// use App\Http\Controllers\Api\OrderItem;
use App\Http\Controllers\Api\OrderItemController as OrderItemController;
use App\Http\Controllers\Api\PostController as PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user',  function (Request $request){
    return $request->user();
})->middleware(middleware: 'auth:sanctum');

// Route::get('/hello', function (){
//     return ['message' => 'Hello, World!']
// });
Route::get('/hello', function(){
    return ['message'=> 'Hello World'];
});

Route::prefix('v1')->group(function(){
    Route::post('/post',[PostController::class, 'store']);
    Route::post('/post/login',[PostController::class, 'login']);
    Route::apiResource( '/item',OrderItemController::class);

    Route::middleware('auth:sanctum')->group(function(){
        Route::apiResource('/post',PostController::class);

    });

});

