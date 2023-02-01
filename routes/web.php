<?php

use App\Http\Controllers\AdminStoryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\StoryController;
use Illuminate\Support\Facades\Route;
use App\Models\Story;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;



Route::get('/',[StoryController::class,'index'] );

Route::get('/stories/{story:slug}',[StoryController::class, 'show'])->where('story','[A-z\d\-_]+');

Route::post('/stories/{story:slug}/comments',[CommentController::class,'store']);

Route::get('/register',[AuthController::class,'create'])->middleware('guest');
Route::post('/register',[AuthController::class,'store'])->middleware('guest');
Route::post('/logout',[AuthController::class,'logout'])->middleware('auth');

Route::get('/login',[AuthController::class,'login'])->middleware('guest');
Route::post('/login',[AuthController::class,'post_login'])->middleware('guest');

Route::post('/stories/{story:slug}/subscription',[StoryController::class,'subscriptionHandler']);

//creation of admin pannel

Route::middleware('can:admin')->group(function(){
    
    Route::get('/admin/stories/create',[AdminStoryController::class,'create']);
    Route::post('/admin/stories/store',[AdminStoryController::class,'store']);
    
    Route::get('/admin/stories',[AdminStoryController::class,'index']);
    Route::delete('/admin/stories/{story:slug}/delete',[AdminStoryController::class,'destroy']);
    
    Route::get('/admin/stories/{story:slug}/edit',[AdminStoryController::class,'edit']);
    Route::patch('/admin/stories/{story:slug}/update',[AdminStoryController::class,'update']);

});


//all             ->index      ->stories.index
//single          ->show       ->stories.show
//form            ->create     ->stories.create
//server store    ->store      -> -
//edit form       ->edit       ->stories.edit
//server update   ->update     -> -
//server delete   ->destroy    -> -








