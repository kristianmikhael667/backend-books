<?php

use App\Http\Controllers\Api\AuthAPI;
use App\Http\Controllers\Api\BookAPI;
use App\Http\Controllers\Api\BookBorrowAPI as AdminBookBorrowAPI;
use App\Http\Controllers\Api\CategoryAPI;
use App\Http\Controllers\Api\MemberApi as AdminMemberApi;
use App\Http\Controllers\Api\ReviewBookAPI;
use App\Http\Controllers\Api\UserAPI;
use App\Http\Controllers\Api\UserImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('jwt.verify', 'verified')->group(function () {
    Route::resource('member', AdminMemberApi::class);
    Route::resource('bookborrow', AdminBookBorrowAPI::class);
    Route::post('bookborrow/return', [AdminBookBorrowAPI::class, 'returnback']);

    Route::post('user/photo', [UserAPI::class, 'updatePhoto']);

    Route::post('memberphone', [AdminMemberApi::class, 'memberphone']);
    Route::get('user/history', [UserAPI::class, 'history']);
    Route::post('user/logout', [AuthAPI::class, 'logout']);
    Route::get('user/myprofile', [UserAPI::class, 'getprofile']);
    Route::post('book/review', [BookAPI::class, 'reviewbook']);
    Route::get('book/review/{id}', [BookAPI::class, 'getDetailMostReview']);
});


Route::get('post-image/{filename}', [UserImage::class, 'image']);
Route::post('login', [AuthAPI::class, 'login']);

// books
Route::get('books/new', [BookAPI::class, 'newsbook']);
Route::get('books', [BookAPI::class, 'allbooks']);
Route::get('books/viewer', [BookAPI::class, 'viewersbook']);
Route::get('books/avgbooks', [BookAPI::class, 'avgreviewbook']);

// Category Books
Route::get('category', [CategoryAPI::class, 'getCategory']);
Route::get('product/{id}/category', [CategoryAPI::class, 'getProductbyCat']);
